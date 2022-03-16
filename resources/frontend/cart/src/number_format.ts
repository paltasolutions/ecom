const number_format = (number: number, decimals: number = 0, decimal_separator: string = '.', thousands_separator: string = ',') => {
    const str = number.toFixed(decimals).toString().split('.');
    const parts = [];
    for (let i = str[0].length; i > 0; i -= 3) {
        parts.unshift(str[0].substring(Math.max(0, i-3), i));
    }
    str[0] = parts.join(thousands_separator);
    return str.join(decimal_separator);
}

export default number_format
