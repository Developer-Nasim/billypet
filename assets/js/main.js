(function($) {
  "use strict";
  
  window.addEventListener('load', () => {
    
  
    if (document.querySelectorAll('.name_giving_permision').length > 0) { 
      let rclct = document.querySelector('.name_giving_permision')
      rclct.addEventListener('click', (e) => { 
          let rPrm = rclct.parentElement;
          let rpmOnly = rPrm.querySelector("input[type='hidden']");
          if (rPrm.classList.contains('no_name')) {
              rPrm.classList.remove('no_name')
              rpmOnly.value = "have_name"
          }else{
              rPrm.classList.add('no_name')
              rpmOnly.value = ""
          } 
      })  
  }

    let btns = document.querySelectorAll('.choseSteps_bottom a')
    if (btns.length > 0) { 
      btns.forEach(btn => {
          btn.addEventListener('click', (e) => {
              e.preventDefault()
              let allType = document.querySelectorAll('.choseSteps_bottom a') 
              let allFrm = document.querySelectorAll('.form') 
              
              allFrm.forEach(frm => {
                  frm.classList.remove('show')
              })
              let keepIt = e.target.href
              let keepItTrimed = keepIt.slice(keepIt.indexOf('#')+1)
              let findDiv = document.querySelector("."+keepItTrimed) 
              if (findDiv) {
                  findDiv.classList.add('show')
              }

              function actionBtns() {
                allType.forEach(aBtn => {
                  aBtn.classList.remove('active')
                })
                btn.classList.add('active')
              }
              actionBtns() 

          })
      })
    }
    $('select').niceSelect();

    let search    = document.querySelectorAll('#search_rec')
    if (search.length > 0) {


      
      let searchFor = document.querySelectorAll('tbody tr')

      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("search_rec");
      filter = input.value.toUpperCase();
      table = document.getElementById("mytable");
      tr = table.getElementsByTagName("tr"); 
      input.addEventListener('keyup', (e) => {  
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }       
        }
      })




      // search.forEach(srcs => {
      //   console.log(searchFor)
      //   srcs.addEventListener('keyup', (e) => {
      //     let tgt = e.target;
      //     searchFor.forEach(lst => { 
      //       let fTd = lst.querySelector('td') 
      //       if (fTd.textContent.toLocaleLowerCase().includes(tgt.value)) {
      //         lst.parentElement.classList.remove('d-none')
      //       }else{
      //         lst.parentElement.classList.add('d-none')
      //       }
      //     })
      //   })
      // })
    }


  })
 
})(jQuery);
