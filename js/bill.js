document.querySelector('.detail').addEventListener('click', function() {
    document.querySelector('.bill_detail-wrapper').style.display = 'block';
});

document.querySelector('.close').addEventListener('click', function() {
    document.querySelector('.bill_detail-wrapper').style.display = 'none';
});