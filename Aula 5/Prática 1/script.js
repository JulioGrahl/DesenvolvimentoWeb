let currentOperand = '0';
let previousOperand = '';
let operation = null;
let shouldResetScreen = false;

const currentOperandElement = document.getElementById('current-operand');
const previousOperandElement = document.getElementById('previous-operand');
const resultDisplayElement = document.getElementById('result-display');

function updateDisplay() {
    currentOperandElement.textContent = currentOperand;
    if (operation != null) {
        previousOperandElement.textContent = `${previousOperand} ${operation}`;
    } else {
        previousOperandElement.textContent = '';
    }
}

function appendNumber(number) {
    if (currentOperand === '0' || shouldResetScreen) {
        currentOperand = '';
        shouldResetScreen = false;
    }
    
    if (number === '.' && currentOperand.includes('.')) return;
    
    currentOperand += number;
    updateDisplay();
}

function appendOperator(op) {
    if (operation !== null) calculate();
    previousOperand = currentOperand;
    operation = op;
    shouldResetScreen = true;
    updateDisplay();
}

function calculate() {
    let computation;
    const prev = parseFloat(previousOperand);
    const current = parseFloat(currentOperand);
    
    if (isNaN(prev) || isNaN(current)) return;
    
    switch (operation) {
        case '+':
            computation = prev + current;
            break;
        case '-':
            computation = prev - current;
            break;
        case '*':
            computation = prev * current;
            break;
        case '/':
            if (current === 0) {
                alert("Erro: Divisão por zero!");
                clearAll();
                return;
            }
            computation = prev / current;
            break;
        default:
            return;
    }
    
    currentOperand = roundResult(computation);
    operation = null;
    previousOperand = '';
    shouldResetScreen = true;

    updateResultDisplay(computation);
    updateDisplay();
}

function roundResult(num) {
    return Math.round(num * 1000000) / 1000000;
}

function updateResultDisplay(result) {
    resultDisplayElement.textContent = roundResult(result);

    resultDisplayElement.classList.remove('positive', 'negative', 'zero');

    if (result > 0) {
        resultDisplayElement.classList.add('positive');
    } else if (result < 0) {
        resultDisplayElement.classList.add('negative');
    } else {
        resultDisplayElement.classList.add('zero');
    }
}

function clearAll() {
    currentOperand = '0';
    previousOperand = '';
    operation = null;
    shouldResetScreen = false;
    updateDisplay();
    resultDisplayElement.textContent = '0';
    resultDisplayElement.classList.remove('positive', 'negative');
    resultDisplayElement.classList.add('zero');
}

function backspace() {
    if (currentOperand.length === 1) {
        currentOperand = '0';
    } else {
        currentOperand = currentOperand.slice(0, -1);
    }
    updateDisplay();
}

clearAll();