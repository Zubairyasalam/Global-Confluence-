<!-- Topics Of Discussion -->
<section class="topics-section">
    @if(!isset($hideTitle) || !$hideTitle)
    <div class="section-header-center">
        <h2 class="section-title">Topics Of <span>Discussion</span></h2>
        <div class="header-line"></div>
        <p class="highlights-subtitle">Science That Shapes Tomorrow's World</p>
    </div>
    @endif
    <div class="topics-grid">
        @for($i = 1; $i <= 3; $i++)
            <div class="topics-card">
                <ul class="topic-list">
                    @php
                        $columnTopics = \App\Models\Topic::where('column_number', $i)->orderBy('sort_order')->get();
                    @endphp
                    @foreach($columnTopics as $topic)
                        <li><i class="fa-solid fa-circle-check"></i> {{ $topic->title }}</li>
                    @endforeach
                </ul>
            </div>
        @endfor
    </div>

</section>
