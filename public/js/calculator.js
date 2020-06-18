// Budget Controller
var budgetController = (function() {
    var Expense = function(id, description, value) {
        this.id =id;
        this.description = description;
        this.value = value;
    }
    var Income = function(id, description, value) {
        this.id =id;
        this.description = description;
        this.value = value;
    }
    var data = {
        allItems: {
            exp: [],
            inc: []
        },
        totals: {
            exp: 0,
            inc: 0
        }
    }
    return {
        addItem: function(type, desc, value) {
            var newItem, ID;
            // create new ID
            if(data.allItems[type].length > 0) {
                ID = data.allItems[type][data.allItems[type].length - 1] + 1;
            } else {
                ID = 0;
            }
            // create new item based on 'inc' or 'exp' type
            if(type === 'exp') {
                newItem = new Expense(ID, desc, value);
            } else if(type === 'inc') {
                newItem = new Income(ID, desc, value);
            }
            // Push new item to data structure
            data.allItems[type].push(newItem);
            // return new item
            return newItem;
        },
        testing: function() {
            console.log(data);
        }
    };
})();

// UI Controller
var UIController = (function() {
    var DOMstrings = {
        inputType: '.add__type',
        inputDescription: '.add__description',
        inputValue: '.add__value',
        inputBtn: '.add__btn',
        incomeContainer: '.income__list',
        expensesContainer: '.expenses__list'
    };
    return {
        getInput: function() {
            return {
                type: document.querySelector(DOMstrings.inputType).value,
                description: document.querySelector(DOMstrings.inputDescription).value,
                value: parseFloat(document.querySelector(DOMstrings.inputValue).value)
            }
        },
        addListItem: function(obj, type) {
            var html, newHtml, element;
            // create HTML string with placeholder text
            if(type === 'inc') {
                element = DOMstrings.incomeContainer;
                html = '<li class="list-group-item px-0 clearfix" id="income-%id%"><div class="float-left"><span class="item__description">%description%</span></div><div class="float-right"><span class="text-success mr-2 item__value">%value%</span><span class="badge badge-pill border border-success bg-white text-success item__delete"><i class="fas fa-times"></i></span></div></li>';
            } else if(type === 'exp') {
                element = DOMstrings.expensesContainer;
                html = '<li class="list-group-item px-0 clearfix" id="expense-%id%"><div class="float-left"><span class="item__description">%description%</span></div><div class="float-right"><span class="text-danger mr-2 item__value">%value%</span><span class="badge badge-danger item__percentage">60%</span><span class="badge badge-pill border border-danger bg-white text-danger ml-2 item__delete"><i class="fas fa-times"></i></span></div></li>';
            }
            // Relplace placeholder text with actual data
            newHtml = html.replace('%id%', obj.id);
            newHtml = newHtml.replace('%description%', obj.description);
            newHtml = newHtml.replace('%value%', obj.value);
            // Insert HTML into DOM
            document.querySelector(element).insertAdjacentHTML('beforeend', newHtml);
        },
        clearFields: function() {
            var fields, fieldsArr;
            fields = document.querySelectorAll(DOMstrings.inputDescription + ', ' + DOMstrings.inputValue);
            fieldsArr = Array.prototype.slice.call(fields);
            fieldsArr.forEach(function(current, index, array) {
                current.value = '';
            });
            fieldsArr[0].focus();
        },
        getDOMstrings: function() {
            return DOMstrings;
        }
    };
})();

// Global App Controller
var controller = (function(budgetCtrl, UICtrl) {
    var setupEventListeners = function() {
        var DOM = UICtrl.getDOMstrings();
        document.querySelector(DOM.inputBtn).addEventListener('click', ctrlAddItem);
        document.addEventListener('keypress', function(event) {
            if(event.keyCode === 13 || event.which === 13) {
                ctrlAddItem();
            }
        });
    };
    var calculateBudget = function() {

    }
    var ctrlAddItem = function() {
        var input, newItem;
        // Get the field input value
        input = UICtrl.getInput();
        if(input.description !== '' && !isNaN(input.value) && input.value > 0) {
            // Add the item to the budget controller
            newItem = budgetCtrl.addItem(input.type, input.description, input.value);
            // Add the item to the UI
            UICtrl.addListItem(newItem, input.type);
            // Clear input fields
            UICtrl.clearFields();
            // Calculate and update budget
            calculateBudget();
        }
    };
    return {
        init: function() {
            console.log('Application has started.');
            setupEventListeners();
        }
    };
})(budgetController, UIController);

controller.init();
