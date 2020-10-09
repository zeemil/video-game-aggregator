<script>
    var progressBarElement = document.getElementById('{{ $slug }}');

    var bar = new ProgressBar.Circle(progressBarElement, {
        color: '#fff',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 6,
        trailWidth: 3,
        trailColor: '#4A5568',
        easing: 'easeInOut',
        duration: 2500,
        text: {
            autoStyleContainer: false
        },
        from: { color: '#48BB78', width: 6 },
        to: { color: '#48BB78', width: 6 },
        // Set default step function for all animate calls
        step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 100);
            if (value === 0) {
                circle.setText('0%');
            } else {
                circle.setText(value + '%');
            }

        }
    });
    // bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
    // bar.text.style.fontSize = 'rem';

    bar.animate({{ $rating }} / 100);
</script>