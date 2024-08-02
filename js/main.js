function minus(params) {
    const openingAmount = document.getElementById("openingBalance")
    const op = openingAmount.value
    const addedFunds = document.getElementById("addfunds").value;
    let z = Number(addedFunds);

    let x = Number(op);
    
    let i = Number(params)

    let y = x - i + z
    let a = 80 * i
    
    document.getElementById("TotalBalance").value = y;
    document.getElementById("amountininr").value = a;
}


function TransfAmt(amount){
    const receivedcash = document.getElementById("receivedcash").value
    let a = Number(receivedcash)

    const amountininr = document.getElementById("amountininr").value 
    let b = Number(amountininr)

    let d = Number(amount)

    let c = b - (a + d)

    document.getElementById("inrbalance").value = c

}


// const refreshpage = document.getElementById("refreshpage")

// refreshpage.addEventListener("click", handleclick)

// function handleclick() {
//     window.location.reload()
// }



