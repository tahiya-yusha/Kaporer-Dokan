@extends('auth')

@section('title', "KaporerDokan-Home")

@section('content')
    @include('include.header')
    <!-- <link href="{{ asset('assets/css/t_style.css') }}" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/t_style.css') }}">
    
  <form action="{{ route('tshirt.store') }}" method="POST">
  @csrf
  <div class="slide-form justify-content-center">
    <div class="slide-box">
      <div class="fieldset-container">
        <fieldset>
          <h2 class="fs-title text-center">Choose your preferred t-shirt type</h2>
          <h3 class="fs-subtitle">This is step 1</h3>
          <select name="tshirt_type" id="tshirt_type">
            <option value="" selected disabled>Select your preferred type</option>
            <option value="basict">Basic T-Shirt</option>
            <option value="polot">Polo T-Shirt</option>
            <option value="dropt">Drop Shoulder</option>
            <option value="jerseyt">Jersey</option>
          </select>
          <select name="tshirt_length" id="tshirt_length">
            <option value="" selected disabled>Select your preferred length</option>
            <option value="full">Full Sleeve</option>
            <option value="half">Half Sleeve</option>
          </select>
          <div class="color-options">
            <label for="color">Choose a color:</label>
            <input type="color" id="color1" name="color1" value="#F44336">
            <input type="color" id="color2" name="color2" value="#E91E63">
            <input type="color" id="color3" name="color3" value="#9C27B0">
            <!-- Add more color options as needed -->
          </div>
          <div class="checkbox-list">
            <p>Choose your preferred position of the print: (Can choose multiple)</p>
            <label for="front">
              <input type="checkbox" name="print_position[]" id="front" value="Front">
              Front
            </label>
            <label for="back">
              <input type="checkbox" name="print_position[]" id="back" value="Back">
              Back
            </label>
            <label for="chest">
              <input type="checkbox" name="print_position[]" id="chest" value="Chest">
              Chest
            </label>
            <label for="shoulder">
              <input type="checkbox" name="print_position[]" id="shoulder" value="Shoulder">
              Shoulder
            </label>
          </div>
        </fieldset>
      </div>
      <a href="#" class="next align-center">Next</a>
    </div>

    <div class="slide-box slided">
      <div class="wrapper">
        <div class="box">
          <div class="js--image-preview"></div>
          <div class="upload-options">
            <label>
              <h4>Upload your choice of print here:</h4>
              <input type="file" class="image-upload" accept="image/*" name="image">
            </label>
          </div>
        </div>
        <div class="preview-box">
          <h4>Image Preview:</h4>
          <div class="image-preview"></div>
        </div>
        <div class="text-input">
          <h4>Enter your text:</h4>
          <input type="text" id="user-text" placeholder="Enter your text here" name="user_text">
        </div>
      </div>
      <a href="#" class="back">Back</a>
      <button type="submit" class="submit">Submit</button>
    </div>
  </div>
  
  </form>



    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/t_work.js') }}"></script>
    
@endsection
