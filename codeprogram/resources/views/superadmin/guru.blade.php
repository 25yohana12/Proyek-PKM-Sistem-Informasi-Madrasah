@extends('layouts.superadmin') 

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Data Guru</h2>
    
    <a href="{{ route('superadmin.guru.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    
    <div class="row">
        @foreach ($gurus as $guru)
        <div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/'.$guru->gambar) }}" class="card-img-top" alt="{{ $guru->namaGuru }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $guru->namaGuru }}</h5>
                    <p class="card-text"><strong>NIP:</strong> {{ $guru->nip }}</p>
                    <p class="card-text"><strong>Posisi:</strong> {{ $guru->posisi }}</p>
                    <p class="card-text"><strong>Deskripsi:</strong> {{ $guru->deskripsi }}</p>
                    
                </div>
                <div class="card-footer">
                    <a href="{{ route('superadmin.guru.edit', $guru->guru_id) }}" class="btn btn-success">Edit</a>
                    <form action="{{ route('superadmin.guru.destroy', $guru->guru_id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    /* General container for layout */
.container {
    max-width: 1200px;
    margin: auto;
}

/* Heading Style */
h2 {
    font-size: 2rem;
    font-weight: bold;
    color: #2c6e49;
}

/* Button Style */
.btn-primary {
    background-color: #2c6e49;
    border-color: #2c6e49;
}

.btn-primary:hover {
    background-color: #255d3c;
    border-color: #255d3c;
}

.btn-success {
    background-color: #4CAF50;
    border-color: #4CAF50;
}

.btn-danger {
    background-color: #f44336;
    border-color: #f44336;
}


/* General Button Styling */
.btn {
    font-size: 1rem;            /* Same font size for both buttons */
    padding: 10px 20px;         /* Same padding for both buttons */
    border-radius: 8px;         /* Same rounded corners */
    display: inline-block;      /* Make sure buttons align properly */
    width: auto;                /* Ensure width adapts to content */
}

/* Edit Button Styling */
.btn-success {
    background-color: #4CAF50; /* Green background for Edit */
    border-color: #4CAF50;
    width: 70px;   /* Lebar 200px */
    height: 50px;  /* Panjang (tinggi) 150px */
}

/* Delete Button Styling */
.btn-danger {
    background-color: #f44336; /* Red background for Delete */
    border-color: #f44336;
    width: 80px;   /* Lebar 200px */
    height: 50px;  /* Panjang (tinggi) 150px */
}

/* Card Footer for buttons */
.card-footer {
    background-color: #A5D6A7;
    display: flex;
    justify-content: flex-start;  /* Align buttons to the left */
    padding: 10px 20px;
    border-radius: 0 0 12px 12px; /* Rounded bottom corners */
}

/* Optional: To make buttons even more consistent */
.form button {
    margin: 5px; /* Add space between buttons */
}


/* Card Layout */
.card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    background-color: #A5D6A7;
    width: 30rem; /* Fixed width */
    height: 30rem; /* Fixed height (you can adjust this based on your content) */
    display: flex;
    flex-direction: column; /* Make content stack vertically */
    justify-content: space-between; /* Space out the content, putting the buttons at the bottom */
    margin-top: 20px; /* Add some space between cards */
}

.card-body {
    background-color: #A5D6A7;
    padding: 20px;
    border-radius: 8px;
    text-align: left; /* Align text to the left */
    flex-grow: 1; /* Allow the body content to take up remaining space */
}

/* Title Styling */
.card-title {
    font-size: 1.25rem;
    font-weight: bold;
    color: #2c6e49;
}

/* Text Styling */
.card-text {
    font-size: 1rem;
    color: #333;
}

/* Image Styling */
.card-img-top {
    width: 90%; /* Set width to 90% of the card */
    height: 200px; /* Fixed height for images */
    border-radius: 8px;
    object-fit: cover;
    aspect-ratio: 4 / 3; /* Set the aspect ratio to 4:3 */
    
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px;
}

/* Add margin between cards */
.row {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap; /* Allow cards to wrap on smaller screens */
}

/* Styling for Card Body */
.guru-body {
    padding: 15px;
}

/* Adjust text content alignment */
.guru-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: #2c6e49;
    margin-bottom: 15px;
}

.guru-card .card-body p {
    margin-bottom: 10px;
    font-size: 1rem;
}

/* Edit and Delete Buttons Styling */
.d-inline-block {
    display: inline-block;
    margin-top: 10px;
    align-self: flex-start; /* Align buttons to the left */
}

form button {
    margin: 5px;
}

/* Align buttons to the bottom left */
.card-body .d-inline-block {
    margin-top: auto; /* Push buttons to the bottom */
}

</style>


@endsection
