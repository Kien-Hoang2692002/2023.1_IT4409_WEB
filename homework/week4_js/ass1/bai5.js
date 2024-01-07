function checkCashRegister(price, cash, cid) {
  const currencyUnit = [
    ["PENNY", 0.01],
    ["NICKEL", 0.05],
    ["DIME", 0.1],
    ["QUARTER", 0.25],
    ["ONE", 1],
    ["FIVE", 5],
    ["TEN", 10],
    ["TWENTY", 20],
    ["ONE HUNDRED", 100],
  ];

  let change = cash - price;
  let changeArr = [];
  let totalInDrawer = 0;

  // Calculate the total amount in the cash-in-drawer
  for (let i = 0; i < cid.length; i++) {
    totalInDrawer += cid[i][1];
  }
  totalInDrawer = totalInDrawer.toFixed(2);

  if (Number(totalInDrawer) < change) {
    return { status: "INSUFFICIENT_FUNDS", change: [] };
  } else if (Number(totalInDrawer) === change) {
    return { status: "CLOSED", change: cid };
  } else {
    for (let i = currencyUnit.length - 1; i >= 0; i--) {
      const [denomination, value] = currencyUnit[i];
      const available = cid[i][1];
      const unitValue = parseFloat(value.toFixed(2));

      if (change >= unitValue) {
        const maxToUse = Math.min(
          available,
          Math.floor(change / unitValue) * unitValue
        );
        change -= maxToUse;
        changeArr.push([denomination, maxToUse]);
        change = parseFloat(change.toFixed(2));
      }
    }
  }

  if (change > 0) {
    return { status: "INSUFFICIENT_FUNDS", change: [] };
  } else {
    return { status: "OPEN", change: changeArr };
  }
}

checkCashRegister(19.5, 20, [
  ["PENNY", 1.01],
  ["NICKEL", 2.05],
  ["DIME", 3.1],
  ["QUARTER", 4.25],
  ["ONE", 90],
  ["FIVE", 55],
  ["TEN", 20],
  ["TWENTY", 60],
  ["ONE HUNDRED", 100],
]);
