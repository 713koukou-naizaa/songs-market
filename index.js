
// wait for DOM to load
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('songDetailsModal');
    const closeModal = document.querySelector('.close');
    const songDetailsModalTitle = document.getElementById('songDetailsModalTitle');
    const songDetailsModalImg = document.getElementById('songDetailsModalImg');

    // open modal
    const songCards = document.querySelectorAll('.songCard');
    songCards.forEach(function(songCard) {
        songCard.addEventListener('click', function() {
            modal.style.display = 'block';
            const songTitle = this.getElementsByClassName('songDetails')[0].getAttribute('data-title');
            const songArtist = this.getElementsByClassName('songDetails')[0].getAttribute('data-artist');
            const songPrice = this.getElementsByClassName('songDetails')[0].getAttribute('data-price');
            const songDuration = this.getElementsByClassName('songDetails')[0].getAttribute('data-duration');
            const songImg = this.getElementsByClassName('songImg')[0].getElementsByTagName('img')[0].getAttribute('src');
            const songDetails = songTitle + ' - ' + songArtist;
            const songSecondaryDetails = songPrice + '€' + '<br>' + songDuration + ' min';
            
            songDetailsModalTitle.innerHTML = songDetails + '<br>' + songSecondaryDetails
            songDetailsModalImg.setAttribute('src', songImg);
        });
    });

    // close modal when close button clicked
    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // close modal when clicked outside
    window.addEventListener('click', function(event) {
        if (event.target === modal) { modal.style.display = 'none'; }
    });
});

function showAddToCartPopup() {
    document.getElementById('addToCartPopup').style.display = 'block';
    const songTitle = document.getElementsByClassName('songDetails')[0].getAttribute('data-title');
    const songPrice = document.getElementsByClassName('songDetails')[0].getAttribute('data-price');

    document.getElementById('addToCartPopupText').innerHTML = 'Added ' + songTitle + ' to cart for ' + songPrice + '€';

    setTimeout(function() {
        document.getElementById('addToCartPopup').style.display = 'none';
    }, 1500);
}

