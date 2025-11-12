document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('evaluationForm');
    const sliders = document.querySelectorAll('.slider');

    sliders.forEach(slider => {
        const valueSpan = document.getElementById('value_' + slider.id);

        function updateValue() {
            valueSpan.textContent = slider.value;
        }

        updateValue();

        slider.addEventListener('input', updateValue);
    });

    if (form) {
        form.addEventListener('submit', function(event) {
            let allAnswered = true;

            sliders.forEach(slider => {
                if (slider.value === null || slider.value === "") {
                    allAnswered = false;
                }
            });

            if (!allAnswered) {
                alert("Por favor, responda a todas as perguntas de avaliação antes de enviar.");
                event.preventDefault(); // Impede a submissão
            }
        });
    }
});