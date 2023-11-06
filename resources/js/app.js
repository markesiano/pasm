import './bootstrap';
import '@fortawesome/fontawesome-free/scss/fontawesome.scss';
import '@fortawesome/fontawesome-free/scss/brands.scss';
import '@fortawesome/fontawesome-free/scss/regular.scss';
import '@fortawesome/fontawesome-free/scss/solid.scss';
import '@fortawesome/fontawesome-free/scss/v4-shims.scss';



document.addEventListener('DOMContentLoaded', function() {
    const starsContainer = document.querySelector('.clasificacion');
    const stars = Array.from(starsContainer.querySelectorAll('label'));

    let rated = false;

    starsContainer.addEventListener('mousemove', (event) => {
        if (!rated) {
            const hoveredStarIndex = stars.indexOf(event.target);
            if (hoveredStarIndex !== -1) {
                for (let i = 0; i <= hoveredStarIndex; i++) {
                    stars[i].classList.add('text-yellow-300');
                }
            }
        }
    });

    starsContainer.addEventListener('mouseleave', () => {
        if (!rated) {
            stars.forEach((star) => {
                star.classList.remove('text-yellow-300');
            });
        }
    });

    starsContainer.addEventListener('mousedown', (event) => {
        rated = true;
        const clickedStarIndex = stars.indexOf(event.target);
        if (clickedStarIndex !== -1) {
            for (let i = 0; i < stars.length; i++) {
                if (i <= clickedStarIndex) {
                    stars[i].classList.add('text-yellow-300');
                } else {
                    stars[i].classList.remove('text-yellow-300');
                }
            }
            // Aquí puedes enviar el valor de la calificación al servidor si es necesario
        }
    });


    starsContainer.addEventListener('click', (event) => {
        const clickedStarIndex = stars.indexOf(event.target);
        if (clickedStarIndex !== -1) {
            const rating = clickedStarIndex + 1;
            const postId = starsContainer.dataset.postId; // Obtén el ID del post desde el atributo data-post-id
            enviarCalificacionAlServidor(rating, postId);
        }
});


 function enviarCalificacionAlServidor(rating, postId) {

        
        
        // Usa AJAX o fetch para enviar la calificación al servidor
        
        // Ejemplo de uso de fetch:
        fetch(`/posts/${postId}/calificar`, {
            method: 'POST',
            
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'), // Asegúrate de incluir el token CSRF
            },
            body: JSON.stringify({ rating: rating }),
        })
        .then(data => {
            // Aquí puedes manejar la respuesta del servidor si es necesario
            console.log('Calificación enviada correctamente.');
            console.log(rating, postId);
        })
        .catch(error => {
            // Maneja errores si es necesario
            console.error('Error al enviar la calificación:', error);
        });
    }


   

    
   
});
