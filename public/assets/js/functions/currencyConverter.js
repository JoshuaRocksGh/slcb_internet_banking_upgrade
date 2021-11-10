function currencyConvertor(
    forexRate,
    amount = 0,
    fromCur = "SLL",
    toCur = "SLL"
) {
    let currencyPair1 = fromCur + "/ " + toCur;
    let currencyPair2 = toCur + "/ " + fromCur;
    let convertedAmount = 0;
    let currencyPair;
    let midrate = 0;
    let conversionData;

    $.each(forexRate, (i) => {
        if (forexRate[i].PAIR === currencyPair1) {
            midrate = forexRate[i].MIDRATE;
            convertedAmount = (
                parseFloat(amount) * parseFloat(midrate)
            ).toFixed(2);
            currencyPair = currencyPair1;
            conversionData = {
                convertedAmount,
                midrate,
                currencyPair,
            };
            return;
        } else if (forexRate[i].PAIR === currencyPair2) {
            midrate = forexRate[i].MIDRATE;
            convertedAmount = (
                parseFloat(amount) / parseFloat(midrate)
            ).toFixed(2);
            currencyPair = currencyPair2;
            conversionData = {
                convertedAmount,
                midrate,
                currencyPair,
            };
            return;
        }
    });
    return conversionData;
}
