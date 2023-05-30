
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if(entry.isIntersecting){
            entry.target.classList.add('show','show2','show3','show4');
        }
    });
});

const hiddenElement = document.querySelectorAll('.hidden,.hidden2,.hidden3,.hidden4');

hiddenElement.forEach((el) => observer.observe(el));

