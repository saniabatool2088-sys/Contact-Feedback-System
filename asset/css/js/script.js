document.addEventListener("DOMContentLoaded", function () {

    // ================================
    // DARK / LIGHT THEME
    // ================================

    const themeToggle = document.getElementById("themeToggle");

    if (themeToggle) {

        themeToggle.addEventListener("click", function () {

            document.body.classList.toggle("dark-mode");

            if (document.body.classList.contains("dark-mode")) {
                themeToggle.textContent = "☀️";
            } else {
                themeToggle.textContent = "🌙";
            }

        });

    }


    // ================================
    // CONTACT FORM - AJAX
    // ================================

    const contactForm = document.getElementById("contactForm");

    if (contactForm) {

        contactForm.addEventListener("submit", function (event) {

            event.preventDefault();

            const formData = new FormData(contactForm);
            const result = document.getElementById("contactMessage");

            result.textContent = "Submitting...";
            result.style.color = "#6c3fb5";

            fetch("ajax.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {

                result.textContent = data.message;

                if (data.success) {
                    result.style.color = "green";
                    contactForm.reset();
                } else {
                    result.style.color = "red";
                }

            })
            .catch(error => {

                result.textContent =
                    "Something went wrong. Please try again.";

                result.style.color = "red";

                console.error(error);

            });

        });

    }


    // ================================
    // FEEDBACK FORM - AJAX
    // ================================

    const feedbackForm = document.getElementById("feedbackForm");

    if (feedbackForm) {

        feedbackForm.addEventListener("submit", function (event) {

            event.preventDefault();

            const formData = new FormData(feedbackForm);
            const result = document.getElementById("feedbackResult");

            result.textContent = "Submitting...";
            result.style.color = "#6c3fb5";

            fetch("ajax.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {

                result.textContent = data.message;

                if (data.success) {
                    result.style.color = "green";
                    feedbackForm.reset();
                } else {
                    result.style.color = "red";
                }

            })
            .catch(error => {

                result.textContent =
                    "Something went wrong. Please try again.";

                result.style.color = "red";

                console.error(error);

            });

        });

    }

});