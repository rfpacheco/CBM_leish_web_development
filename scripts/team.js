function showDetails(memberId) {
    const details = {
        requena: {
            image: '../img/lab_team/requena.png',
            description: 'Insert amazing story and quote in amazing black and white img.'
        },
        begona: {
            image: '../img/lab_team/begona.png',
            description: 'Insert amazing story and quote in amazing black and white img.'
        },
        sandra: {
            image: '../img/lab_team/sandra.png',
            description: 'Insert amazing story and quote in amazing black and white img.'
        },
        javi: {
            image: '../img/lab_team/javi.png',
            description: 'Insert amazing story and quote in amazing black and white img.'
        },
        alex: {
            image: '../img/lab_team/alex.png',
            description: 'Insert amazing story and quote in amazing black and white img.'
        },
        ronny: {
            image: '../img/lab_team/ronny.png',
            description: 'Insert amazing story and quote in amazing black and white img.'
        },
    };

    const largeImage = document.getElementById('large-image');
    const memberDescription = document.getElementById('member-description');
    const memberDetails = details[memberId];

    if (memberDetails) {
        largeImage.src = memberDetails.image;
        largeImage.style.display = 'block';
        memberDescription.textContent = memberDetails.description;
    }
}
