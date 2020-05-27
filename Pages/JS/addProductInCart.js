    function addProductInCart(id_produs) {
        var products = JSON.parse(localStorage.getItem("cartProducts"));
        var count = JSON.parse(localStorage.getItem("countProducts"));
        //console.log("Before: " + products + " | " + count);
        if (products == null) {
            products = [];
            count = [];
        }
        const index = Object.values(products).indexOf(id_produs);
        if (index > -1) {
            count[index] = parseInt(count[index]) + 1;
        } else {
            products.push(id_produs);
            count.push(1);
        }

        //console.log("After: " + products + " | " + count);
        localStorage.setItem("cartProducts", JSON.stringify(products));
        localStorage.setItem("countProducts", JSON.stringify(count));
    }
