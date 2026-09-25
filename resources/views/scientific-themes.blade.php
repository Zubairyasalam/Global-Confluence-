@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

    <!-- Page Banner -->
    <div class="page-banner" style="background-color: #0a192f;">
        <div class="page-banner-content">
            <h1 style="color: #fff;">SCIENTIFIC TRACKS & THRUST AREAS</h1>
            <p style="color: #cbd5e1; font-size: 1.1rem; margin-top: 15px; max-width: 800px; margin-left: auto; margin-right: auto; line-height: 1.6;">
                Explore the latest advancements, critical challenges, and future innovations across our core diagnostic and scientific themes. This detailed section explains our six main tracks and the track-wise presentation schedule for the conference.
            </p>
        </div>
    </div>

<!-- Content Section -->
<div style="padding: 40px 0;">
    @include('sections.thrust-areas')
</div>

@include('sections.footer')

@endsection
