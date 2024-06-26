const qrText=document.getElementById('qr_text');
const sizes=document.getElementById('sizes');
const generate=document.getElementById('generate');
const download=document.getElementById('download');
const qrcodebox=document.querySelector('.body-qr');

let size = sizes.value;
generate.addEventListener('click',(e)=>{
    e.preventDefault();
    isEmptyInput();
});
sizes.addEventListener('change',(e)=>{
    size=e.target.value;
    isEmptyInput();
});

download.addEventListener('click',()=>{
    let img=document.querySelector('.body-qr img');
    if(img !== null){
        let imgAtrr=img.getAttribute('src');
        download.setAttribute("href",imgAtrr);
    }
});

function isEmptyInput(){
    qrText.value.length>0?generateQRCode():alert('Vui lòng nhập văn bản hoặc URL để tạo QR Code');
}

function generateQRCode(){
    qrcodebox.innerHTML = "";
    new QRCode(qrcodebox, {
        text:qrText.value,
        height:size,
        width:size,
        colorLight:"#fff",
        colorDark:"#000",
    });
}

var sideBarBtnIsOpen=true;
        toggleBtn.addEventListener('click',(event)=>{
            event.preventDefault();
            if(sideBarBtnIsOpen){
                dashboard_sidebar.style.width='10%';
                dashboard_sidebar.style.transition='0.3s all';
                dashboard_content_container.style.width='90%';
                dashboard_logo.style.fontSize='60px';
                userImage.style.width='60px';
                menuIcons=document.getElementsByClassName('menuText');
                for (var i=0; i<menuIcons.length;i++){
                    menuIcons[i].style.display='none';
                }
                document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign='center';
                sideBarBtnIsOpen=false;
            }else{
                dashboard_sidebar.style.width='20%';
                dashboard_content_container.style.width='80%';
                dashboard_logo.style.fontSize='80px';
                userImage.style.width='80px';
                menuIcons=document.getElementsByClassName('menuText');
                for (var i=0; i<menuIcons.length;i++){
                    menuIcons[i].style.display='inline-block';
                }
                document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign='left';
                sideBarBtnIsOpen=true;
            }
       });
        document.addEventListener('click',function(e){
            let clickedEl=e.target;
            if(clickedEl.classList.contains('showHideSubMenu')){
                let subMenu=clickedEl.closest('li').querySelector('.subMenus');
                let mainMenuIcon=clickedEl.closest('li').querySelector('.mainMenuIconArrow');
                let subMenus=document.querySelectorAll('.subMenus');
                subMenus.forEach((sub)=>{
                    if(subMenu !=sub) sub.style.display='none';
                });
                showHideSubMenu(subMenu, mainMenuIcon);
                
                
            }
        });
        function showHideSubMenu(subMenu, mainMenuIcon){
            if(subMenu != null){
    
                if(subMenu.style.display ==='block'){
                    subMenu.style.display='none';
                    mainMenuIcon.classList.remove('fa-angle-down');
                    mainMenuIcon.classList.add('fa-angle-left');
                }else {
                    subMenu.style.display='block';
                    mainMenuIcon.classList.remove('fa-angle-left');
                    mainMenuIcon.classList.add('fa-angle-down');
                } 
            }
        }
    
        let pathArray=window.location.pathname.split('/');
        let curFile=pathArray[pathArray.length-1];
        let curNav =document.querySelector('a[href="./'+curFile+'"]');
        curNav.classList.add('subMenuActive');
        let mainNav= curNav.closest('li.liMainMenu');
        mainNav.style.background='#f685a1';
        let subMenu=curNav.closest('.subMenus');
        let mainMenuIcon=mainNav.querySelector('i.mainMenuIconArrow');
        
        showHideSubMenu(subMenu, mainMenuIcon);
        console.log(curNav);
