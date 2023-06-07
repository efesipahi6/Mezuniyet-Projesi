/* navbar değişimi */

window.addEventListener('scroll', () => {
    document.querySelector('nav').classList.toggle
    ('window-scroll', window.scrollY > 0)
})


/* KOYU TEMA */
let darkMode = localStorage.getItem('darkMode');
const body = document.querySelector('body');
const modeText = body.querySelector(".mode-text");
const darkModeToggler = document.getElementById('dark-mode-toggler');

const enableDarkMode = () => {
    document.body.classList.add('dark-mode');
    localStorage.setItem('darkMode', 'enable');
}

const disableDarkMode = () => {
    document.body.classList.remove('dark-mode');
    localStorage.removeItem('darkMode');
}

if(darkMode === 'enable'){
    enableDarkMode();
    darkModeToggler.checked = true;
}



darkModeToggler.addEventListener('change', () => {
    darkMode = localStorage.getItem('darkMode');
    if(darkMode !== 'enable') {
        enableDarkMode()
        modeText.innerText = "Aydınlık Mod";
    } 
    else{
        disableDarkMode()
        modeText.innerText = "Karanlık Mod";
    } 
})


const navItems = document.querySelector('.nav__items');
const openNavBtn = document.querySelector('#open__nav-btn');
const closeNavBtn = document.querySelector('#close__nav-btn');

/* responsive menu açma */
const openNav = () => {
    navItems.classList.add('show');
    openNavBtn.style.display = 'none';
    closeNavBtn.style.display = 'inline-block';
}

/* responsive menu kapatma */
const closeNav = () => {
    navItems.classList.remove('show');
    openNavBtn.style.display = 'inline-block';
    closeNavBtn.style.display = 'none';
}

openNavBtn.addEventListener('click', openNav);
closeNavBtn.addEventListener('click', closeNav);





/* MOBİL YÖNETİM PANELİ AÇMA VE KAPATMA */
const sidebar = document.querySelector('aside');
const showSidebarBtn = document.querySelector('#show__sidebar-btn');
const hideSidebarBtn = document.querySelector('#hide__sidebar-btn');


const showSidebar = () => {
    sidebar.style.left = '0';
    showSidebarBtn.style.display = 'none';
    hideSidebarBtn.style.display = 'inline-block'
}

const hideSidebar = () => {
    sidebar.style.left = '-100%';
    showSidebarBtn.style.display = 'inline-block';
    hideSidebarBtn.style.display = 'none'
}


showSidebarBtn.addEventListener('click', showSidebar);
hideSidebarBtn.addEventListener('click', hideSidebar);




