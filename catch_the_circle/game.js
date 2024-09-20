document.getElementById('startGame').addEventListener('click', function() {
    let score = 0;
    const gameArea = document.getElementById('gameArea');
    const circle = document.getElementById('circle');
    const scoreBoard = document.getElementById('scoreBoard');
    const scoreInput = document.getElementById('scoreInput');
    
    circle.style.display = 'block';

    const moveCircle = () => {
        const x = Math.random() * (gameArea.clientWidth - 50);
        const y = Math.random() * (gameArea.clientHeight - 50);
        circle.style.left = `${x}px`;
        circle.style.top = `${y}px`;
    };

    const incrementScore = () => {
        score++;
        scoreBoard.textContent = `Score: ${score}`;
        moveCircle();
    };

    circle.addEventListener('click', incrementScore);

    setTimeout(() => {
        circle.style.display = 'none';
        scoreInput.value = score;
        alert(`Game over! Your score is ${score}`);
    }, 10000);

    moveCircle();
});
