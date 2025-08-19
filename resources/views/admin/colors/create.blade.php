@extends('layouts.admin')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css"/> <!-- 'classic' theme -->



@section('content')
<div class="row">
    <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3> Add Color
                    <a href="{{ url('admin/colors') }}" class = "btn btn-secondary btn-sm float-end">
                        Back
                    </a>
                </h3>
            </div>
            <div class="card-body">

                <form action="{{ url('admin/colors/create') }}" method = "POST">
                    @csrf

                    <div class="mb-3">
                        <label for="">Color Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    
                    <div class="color-picker">
                        
                    </div>

                    <div class="mb-3">
                        <label for="">Color Code</label>
                        <input type="text" name="code" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label> <br/>
                        <input type="checkbox" name="status" style = "width:20px; height:20px;"/> Checked=Hidden,UnChecked=Visible
                    </div>
                    <div class="mb-3">
                        <button type = "submit" class = "btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection

<script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pickr = Pickr.create({
    el: '.color-picker',
    theme: 'classic', // or 'monolith', or 'nano'

    swatches: [
        'rgba(244, 67, 54, 1)',
        'rgba(233, 30, 99, 0.95)',
        'rgba(156, 39, 176, 0.9)',
        'rgba(103, 58, 183, 0.85)',
        'rgba(63, 81, 181, 0.8)',
        'rgba(33, 150, 243, 0.75)',
        'rgba(3, 169, 244, 0.7)',
        'rgba(0, 188, 212, 0.7)',
        'rgba(0, 150, 136, 0.75)',
        'rgba(76, 175, 80, 0.8)',
        'rgba(139, 195, 74, 0.85)',
        'rgba(205, 220, 57, 0.9)',
        'rgba(255, 235, 59, 0.95)',
        'rgba(255, 193, 7, 1)'
    ],

    components: {

        // Main components
        preview: true,
        opacity: true,
        hue: true,

        // Input / output Options
        interaction: {
            hex: true,
            input: true,
            clear: true,
            save: true
        }
    }
});
});

    
</script>

