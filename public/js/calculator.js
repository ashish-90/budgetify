// Budget Controller
var budgetController = (function() {
    var Expense = function(id, description, value) {
        this.id =id;
        this.description = description;
        this.value = value;
        this.percentage = -1;
    }
    Expense.prototype.calcPercentage = function(totalIncome) {
        if(totalIncome > 0) {
            this.percentage = Math.round((this.value / totalIncome) * 100);
        } else {
            this.percentage = -1;
        }
    }
    Expense.prototype.getPercentage = function() {
        return this.percentage;
    }
    var Income = function(id, description, value) {
        this.id =id;
        this.description = description;
        this.value = value;
    }
    var calculateTotal = function(type) {
        var sum = 0;
        data.allItems[type].forEach(function(cur) {
            sum += cur.value;
        });
        data.totals[type] = sum;
    }
    var data = {
        allItems: {
            exp: [],
            inc: []
        },
        totals: {
            exp: 0,
            inc: 0
        },
        budget: 0,
        percentage: -1
    }
    return {
        addItem: function(type, desc, value) {
            var newItem, ID;
            // create new ID
            if(data.allItems[type].length > 0) {
                ID = data.allItems[type][data.allItems[type].length - 1].id + 1;
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
        deleteItem: function(type, id) {
            var ids, index;
            ids = data.allItems[type].map(function(current) {
                return current.id;
            });
            index = ids.indexOf(id);
            if(index !== -1) {
                data.allItems[type].splice(index, 1);
            }
        },
        calculateBudget() {
            // Calculate total income and expenses
            calculateTotal('inc');
            calculateTotal('exp');
            // Calculate budget: Income - expenses
            data.budget = data.totals.inc - data.totals.exp;
            // Calculate the percentage of income
            if(data.totals.inc > 0) {
                data.percentage = Math.round((data.totals.exp / data.totals.inc) * 100);
            } else {
                data.percentage = -1;
            }  
        },
        calculatePercentages: function() {
            data.allItems.exp.forEach(function(cur) {
                cur.calcPercentage(data.totals.inc);
            });
        },
        getPercentages: function() {
            var allPerc = data.allItems.exp.map(function(cur) {
                return cur.getPercentage();
            });
            return allPerc;
        },
        getBudget() {
            return {
                budget: data.budget,
                totalInc: data.totals.inc,
                totalExp: data.totals.exp,
                percentage: data.percentage
            }
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
        select2: '.select2-selection--single',
        inputDescription: '.add__description',
        inputValue: '.add__value',
        inputBtn: '.add__btn',
        incomeContainer: '.income__list',
        expensesContainer: '.expenses__list',
        budgetLabel: '.budget__value',
        incomeLabel: '.budget__income--value',
        expensesLabel: '.budget__expenses--value',
        percentageLabel: '.budget__expenses--percentage',
        container: '.inc-exp-container',
        expensesPercLabel: '.item__percentage',
        dateLabel: '.budget__title--month'
    };
    var formatNumber = function(num, type) {
        var numSplit, int, dec,type;
        num = Math.abs(num);
        num = num.toFixed(2);
        numSplit = num.split('.');
        int = numSplit[0];
        if(int.length > 3) {
            int = int.substr(0, int.length - 3) + ',' + int.substr(int.length - 3, 3);
        }
        dec = numSplit[1];
        return (type === 'exp' ? '-' : '+') + ' ' + int + '.' + dec;
    }
    var nodeListForEach = function(list, callback) {
        for(var i = 0; i < list.length; i++) {
            callback(list[i], i);
        }
    }
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
                html = '<li class="list-group-item px-0 clearfix" id="inc-%id%"><div class="float-left"><span class="item__description">%description%</span></div><div class="float-right"><span class="text-success mr-2 item__value">%value%</span><span class="badge badge-pill border border-success bg-white text-success item__delete"><i class="fas fa-times"></i></span></div></li>';
            } else if(type === 'exp') {
                element = DOMstrings.expensesContainer;
                html = '<li class="list-group-item px-0 clearfix" id="exp-%id%"><div class="float-left"><span class="item__description">%description%</span></div><div class="float-right"><span class="text-danger mr-2 item__value">%value%</span><span class="badge badge-danger item__percentage">60%</span><span class="badge badge-pill border border-danger bg-white text-danger ml-2 item__delete"><i class="fas fa-times"></i></span></div></li>';
            }
            // Relplace placeholder text with actual data
            newHtml = html.replace('%id%', obj.id);
            newHtml = newHtml.replace('%description%', obj.description);
            newHtml = newHtml.replace('%value%', formatNumber(obj.value, type));
            // Insert HTML into DOM
            document.querySelector(element).insertAdjacentHTML('beforeend', newHtml);
        },
        deleteListItem: function(selectorID) {
            var el = document.getElementById(selectorID);
            el.parentNode.removeChild(el);
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
        displayBudget: function(obj) {
            var type;
            obj.budget > 0 ? type = 'inc' : type = 'exp';
            document.querySelector(DOMstrings.budgetLabel).textContent = formatNumber(obj.budget, type);
            document.querySelector(DOMstrings.incomeLabel).textContent = formatNumber(obj.totalInc, 'inc');
            document.querySelector(DOMstrings.expensesLabel).textContent = formatNumber(obj.totalExp, 'exp');
            if(obj.percentage > 0) {
                document.querySelector(DOMstrings.percentageLabel).textContent = obj.percentage + '%';
            } else {
                document.querySelector(DOMstrings.percentageLabel).textContent = '---';
            }
        },
        displayPercentages: function(percentages) {
            var fields = document.querySelectorAll(DOMstrings.expensesPercLabel);
            nodeListForEach(fields, function(current, index) {
                if(percentages[index] > 0) {
                    current.textContent = percentages[index] + '%'
                } else {
                    current.textContent = '---';
                }
            });
        },
        displayMonth: function() {
            var now, month, months, year;
            now = new Date();
            months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            month = now.getMonth();
            year = now.getFullYear();
            document.querySelector(DOMstrings.dateLabel).textContent = months[month] + ' ' + year;
        },
        changedType: function() {
            document.querySelector(DOMstrings.select2).classList.toggle('select2-selection');
            var fields = document.querySelectorAll(
                DOMstrings.inputDescription + ',' +
                DOMstrings.inputValue
            );
            nodeListForEach(fields, function(cur) {
                cur.classList.toggle('is-valid');
                cur.classList.toggle('is-invalid');
            });
            document.querySelector(DOMstrings.inputBtn).classList.toggle('btn-outline-success');
            document.querySelector(DOMstrings.inputBtn).classList.toggle('btn-outline-danger');
        },
        getDOMstrings: function() {
            return DOMstrings;
        }
    };
})();

// Global App Controller
var controller = (function(budgetCtrl, UICtrl) {
    var DOM = UICtrl.getDOMstrings();
    var setupEventListeners = function() {
        document.querySelector(DOM.inputBtn).addEventListener('click', ctrlAddItem);
        document.addEventListener('keypress', function(event) {
            if(event.keyCode === 13 || event.which === 13) {
                ctrlAddItem();
            }
        });
        document.querySelector(DOM.container).addEventListener('click', ctrlDeleteItem);
        $('.add__type').on('select2:select', UICtrl.changedType);
    };
    var updateBudget = function() {
        // Calculate the budget
        budgetCtrl.calculateBudget();
        // Return the budget
        var budget = budgetCtrl.getBudget();
        // Display the budget on the UI
        UICtrl.displayBudget(budget);
    };
    var updatePercentacges = function() {
        budgetCtrl.calculatePercentages();
        var percentages = budgetCtrl.getPercentages();
        UICtrl.displayPercentages(percentages);
    };
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
            updateBudget();
            // Calculate and update percentages
            updatePercentacges();
        }
    };
    var ctrlDeleteItem = function(event) {
        var itemID, splitID, type, ID;
        itemID = event.target.parentNode.parentNode.parentNode.id;
        splitID = itemID.split('-');
        type = splitID[0];
        ID = parseInt(splitID[1]);
        budgetCtrl.deleteItem(type, ID);
        UICtrl.deleteListItem(itemID);
        updateBudget();
        // Calculate and update percentages
        updatePercentacges();
    };
    return {
        init: function() {
            console.log('Application has started.');
            UICtrl.displayMonth(); 
            UICtrl.displayBudget({
                budget: 0,
                totalInc: 0,
                totalExp: 0,
                percentage: -1
            });
            setupEventListeners();
            document.querySelector(DOM.inputDescription).focus();
        }
    };
})(budgetController, UIController);

controller.init();
