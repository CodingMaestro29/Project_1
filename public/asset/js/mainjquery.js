/*toggle*/
document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('navbar-toggle');
    const menu = document.getElementById('navbar-menu'); 
    const crossIcon = document.querySelector('.fas.fa-times'); 

    toggleButton.addEventListener('click', function() {
        menu.classList.toggle('active'); 
        if (menu.classList.contains('active')) {
            crossIcon.style.display = 'block'; // Show the cross icon when menu is active
            toggleButton.style.display = 'none'; // Hide the toggle icon
        } else {
            crossIcon.style.display = 'none'; // Hide the cross icon when menu is not active
            toggleButton.style.display = 'block'; // Show the toggle icon
        }
    }); 
   
    crossIcon.addEventListener('click', function() { 
        menu.classList.remove('active');  
        crossIcon.style.display = 'none'; // Hide the cross icon when menu is closed 
        toggleButton.style.display = 'block'; // Show the toggle icon  
    });

    toggleButton.addEventListener('click', function() {
        crossIcon.style.display = 'block'; // Display cross icon when toggle button is clicked
        toggleButton.style.display = 'none'; // Hide the toggle icon when toggle button is clicked
    });

    // Adding click event listener to the cross icon to display the toggle icon again
    crossIcon.addEventListener('click', function() {
        toggleButton.style.display = 'flex'; // Show the toggle icon when cross icon is clicked
    }); 
});

    // document.addEventListener('DOMContentLoaded', function() {
    //     const toggleButton = document.getElementById('navbar-toggle');
    //     const menu = document.getElementById('navbar-menu');

    //     toggleButton.addEventListener('click', function() {
    //         menu.classList.toggle('active');
    //         toggleButton.querySelector('.fas').classList.toggle('fa-times'); // Toggle cross icon
    //     }); 
    // });

/*faq*/
     document.addEventListener('DOMContentLoaded', function () {
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(function (question) {
        question.addEventListener('click', function () { 
            const parent = this.parentElement;
            const isActive = parent.classList.contains('active');

            // Close all items 
            faqQuestions.forEach(function (q) { 
                q.parentElement.classList.remove('active'); 
            });   
 
            // Open only the clicked item if it wasn't already open
            if (!isActive) {
                parent.classList.add('active');
            }
        });
    });
});