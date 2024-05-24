document.addEventListener('DOMContentLoaded', function() {
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    const navLinks = document.getElementById('nav-links');
    // const links = document.querySelectorAll('#nav-link');
    // const activeLink = localStorage.getItem('activelink')

   
    menuIcon.addEventListener('click', ()=>{
        navLinks.classList.toggle('hidden')
    })

    // if(activeLink){
    //     const activeElement = document.querySelector(`a[href="${activeLink}"]`);
    //     if(activeElement){
    //         activeElement.classList.add('active')
    //     }
    // }

    // links.forEach(link => {
    //     link.addEventListener('click', (e)=>{
    //         e.preventDefault()

    //         links.forEach(link => link.classList.remove('active'));

    //         this?.classList?.add('active');

    // localStorage.setItem('activelink',this?.getAttribute('href'));
    // window.location.hash = this.getAttribute('href');
    //     })
    // })
});
