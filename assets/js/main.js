(function($) {
  "use strict";
  
  window.addEventListener('load', () => { 

    // Name Giving permision
    function NameGivingPermision() { 
      if (document.querySelectorAll('.name_giving_permision').length > 0) { 
        let rclct = document.querySelector('.name_giving_permision')
        rclct.addEventListener('click', (e) => { 
            let rPrm = rclct.parentElement;
            let rpmOnly = rPrm.querySelector("input[type='hidden']");
            let setValue = rPrm.querySelector("input[type='text']");
            if (rPrm.classList.contains('no_name')) {
                rPrm.classList.remove('no_name')
                rpmOnly.value = "have_name" 
            }else{
                rPrm.classList.add('no_name')
                rpmOnly.value = ""
                setValue.value = ""
            } 
        })  
      }
    }
    NameGivingPermision()

  // Chose Steps
  function ChoseSteps() { 
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
  }
  ChoseSteps()

  // Nice select
  $('select').niceSelect();


    // formValidation
    function FormValidation() {
      let forms = document.querySelectorAll('form')
      if (forms.length > 0) {
        forms.forEach(frm => {
          let submitBtn = frm.querySelectorAll('[type=submit]') 
          submitBtn.forEach(sbtn => {
            let fileds = frm.querySelectorAll('[required]') 
            sbtn.addEventListener('click', (e) => { 
              fileds.forEach(fld => {
                let dVlu = fld.value.trim();
                if (fld.type === "checkbox") {
                  if (!fld.checked) { 
                    fld.classList.add('it_is_empty')
                    fld.parentElement.classList.add('requered')
                  }else{
                    fld.classList.remove('it_is_empty')
                    fld.parentElement.classList.remove('requered') 
                  }
                }else{
                  if (dVlu === "" || dVlu.length <= 0) { 
                    fld.classList.add('it_is_empty')
                    fld.parentElement.classList.add('requered')
                  }else{
                    fld.classList.remove('it_is_empty')
                    fld.parentElement.classList.remove('requered') 
                  }
                }
              })
            })
            
          });

        })
      }
    } 
    FormValidation()

    // fileUpOpts
    function fileUpPermission() {
        if (document.querySelectorAll('.setOrderToUpOpt').length > 0) {
            let ChangeInp = document.querySelectorAll('.setOrderToUpOpt input')
            ChangeInp.forEach(inp => {
              inp.addEventListener('change', (e) => {
                let MainUpsArea = inp.parentElement.parentElement.parentElement.querySelector('.allFileUploads')
                let target = e.target;
                MainUpsArea.innerHTML = "";
                for (let i = 0; i < Number(target.value); i++) {
                  let mdiv = document.createElement('DIV')
                  mdiv.classList.add('singleFileUpload')
                  mdiv.innerHTML = `
                      <label for="#petfileUp${i}" class="fileUpload">
                          <input type="file" name="petfile${i}" id="petfileUp${i}" accept=".png,.jpg,.jpeg" required>
                          <img src="assets/img/icons/gallery.png" alt="">
                          <p>Drop your image here, or <b>browse</b></p>
                          <span>Supports: JPG, PNG, JPEG</span>
                      </label> 
                      <input type="text" placeholder="Name of the pet" name="namepets${i}" id="namepets" required>
                  `; 
                   
                  MainUpsArea.appendChild(mdiv)
                  
                } 
                FormValidation()
                UploadMultipleFile() 
              })
            })
          
        }
    }
    fileUpPermission()


    // upload multiple file
    function UploadMultipleFile() {
      let fileUps = document.querySelectorAll('[type="file"]')
      if (fileUps.length > 0) { 
        fileUps.forEach(inp => {
          fileUpPermission() 
          inp.addEventListener('change', (e) => { 
            let imgRp = inp.parentElement.parentElement; 
            const reader = new FileReader();
            reader.onload = function () {
              if (imgRp.querySelectorAll('img.imgPrev').length > 0) { 
                let gImg = imgRp.querySelector('img.imgPrev')
                gImg.setAttribute('src',reader.result) 
              }else{ 
                let Img = document.createElement('IMG')
                Img.setAttribute('src', reader.result)
                Img.classList.add('imgPrev')
                imgRp.appendChild(Img) 
              }
            }
            reader.readAsDataURL(inp.files[0]) 
          },false)
        })
      }
    }
    UploadMultipleFile()
 
    
    // Search on dashboard
    function SearchDashConts() { 
      let search    = document.querySelectorAll('#search_rec')
      if (search.length > 0) { 
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
    }
    SearchDashConts()

 
 






  })
 
})(jQuery);
