document.getElementById('calculate').addEventListener('click', function() {
    var clothes = parseInt(document.getElementById('clothes').value) || 0;
    var books = parseInt(document.getElementById('books').value) || 0;
    var sanitaryNapkins = parseInt(document.getElementById('sanitaryNapkins').value) || 0;
    var blankets = parseInt(document.getElementById('blankets').value) || 0;

    var total = (clothes * clothesPrice) + (books * booksPrice) + (sanitaryNapkins * sanitaryNapkinsPrice) + (blankets * blanketsPrice);

    document.getElementById('total').textContent = 'Total: $' + total;
});

document.getElementById('proceed').addEventListener('click', function() {
    window.location.href = 'payment_gateway.php';
});
