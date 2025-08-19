$(document).ready(function(){
    $('.image-upload').change(function() {
    var file = this.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
      $('.image-preview').css('background-image', 'url("' + reader.result + '")');
    };
    if (file) {
      reader.readAsDataURL(file);
    } else {
      $('.image-preview').css('background-image', '');
    }
  });
  $(".next").on('click',function(){
    $(this).parent().addClass('done')
    $(this).parent().next().removeClass('slided');
  })
  $(".back").on('click',function(){
    $(this).parent().addClass('slided')
    $(this).parent().prev().removeClass('done');
  })
  
})


// Get the necessary elements
const tshirtSelect = document.getElementById('tshirt');
const tshirtImage = document.querySelector('.tshirt-image');

// Add event listener to the t-shirt select element
tshirtSelect.addEventListener('change', changeTshirtImage);

// Function to change the t-shirt image
function changeTshirtImage() {
    const selectedTshirt = tshirtSelect.value;
    let imageUrl = '';

    switch (selectedTshirt) {
      case 'tshirt1':
        imageUrl = "{{ asset('tshirts/half-sleeve-front.png') }}";
        break;
      case 'tshirt2':
          imageUrl = "{{ asset('tshirts/full-sleeve-front.png') }}";
          break;
      case 'tshirt3':
          imageUrl = "{{ asset('tshirts/drop-shoulder-front.png') }}";
          break;
      default:
          imageUrl = ''; // Set a default image or leave it empty
          break;
    }

    tshirtImage.style.backgroundImage = `url(${imageUrl})`;
}

const dropdown = document.getElementById("tshirt_type");

  // Add event listener to handle hover and click events
  dropdown.addEventListener("mouseover", showOptions);
  dropdown.addEventListener("click", selectOption);

  // Function to show dropdown options on hover
  function showOptions() {
    dropdown.size = dropdown.options.length;
  }

  // Function to select an option and keep it selected after click
  function selectOption() {
    const selectedOption = dropdown.value;
    dropdown.size = 1; // Collapse the dropdown back to one visible option
    // Set a selected attribute for the chosen option
    for (let i = 0; i < dropdown.options.length; i++) {
      if (dropdown.options[i].value === selectedOption) {
        dropdown.options[i].setAttribute("selected", true);
      } else {
        dropdown.options[i].removeAttribute("selected");
      }
    }
  }


// JavaScript to handle image selection and updating the hidden input
document.addEventListener("DOMContentLoaded", function() {
  const tshirtOptions = document.querySelectorAll(".tshirt-type-option");
  const tshirtTypeInput = document.getElementById("tshirt_type");

  tshirtOptions.forEach(function(option) {
      option.addEventListener("click", function() {
          tshirtOptions.forEach(function(opt) {
              opt.classList.remove("selected");
          });
          option.classList.add("selected");
          tshirtTypeInput.value = option.getAttribute("data-value");
      });
  });
});

$(document).ready(function () {
  $('.tshirt-type-option').on('click', function () {
      const selectedType = $(this).attr('data-value');
      $('#tshirt_type').val(selectedType);
      $('.tshirt-type-option').not(this).hide();
  });

  $('.next').on('click', function () {
      $('.tshirt-type-option').show();
  });
});


