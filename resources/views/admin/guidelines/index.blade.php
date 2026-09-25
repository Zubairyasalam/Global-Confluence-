@extends('layouts.admin_cms')

@section('header_title', 'Abstract & Presentation Guidelines Settings')

@section('content')
<style>
    .page-title {
        color: #1a237e;
        font-size: 1.8rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }
    .page-title::before {
        content: '';
        display: block;
        width: 6px;
        height: 28px;
        background: linear-gradient(180deg, #009688 0%, #00796b 100%);
        border-radius: 10px;
    }

    .success-alert {
        background-color: #e8f5e9;
        color: #2e7d32;
        border: 1px solid #c8e6c9;
        border-radius: 8px;
        padding: 15px 20px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 500;
    }

    .config-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        border: 1px solid #f1f5f9;
        padding: 30px;
        margin-bottom: 30px;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 15px;
    }

    .card-title {
        color: #1e293b;
        font-size: 1.25rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .card-title i {
        color: #009688;
    }

    .form-group {
        margin-bottom: 20px;
    }
    .form-label {
        display: block;
        font-weight: 600;
        color: #475569;
        margin-bottom: 8px;
        font-size: 0.9rem;
    }
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        font-family: inherit;
        font-size: 0.95rem;
        color: #334155;
        transition: all 0.3s;
        box-sizing: border-box;
    }
    .form-control:focus {
        border-color: #009688;
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 150, 136, 0.1);
    }

    .btn-save {
        background: #009688;
        color: #ffffff;
        border: none;
        padding: 12px 32px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1.05rem;
        cursor: pointer;
        transition: background 0.3s, transform 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-save:hover {
        background: #00796b;
        transform: translateY(-1px);
    }

    .btn-add {
        background: #f1f5f9;
        color: #0f172a;
        border: 1px dashed #cbd5e1;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-add:hover {
        background: #e2e8f0;
        border-color: #009688;
        color: #009688;
    }

    .btn-delete-item {
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
        border: 1px solid rgba(239, 68, 68, 0.2);
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-delete-item:hover {
        background: #ef4444;
        color: #ffffff;
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .card-box-item {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 15px;
    }
    .badge-item {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #009688;
        color: #ffffff;
        font-weight: 800;
        font-size: 0.85rem;
        padding: 4px 12px;
        border-radius: 20px;
        margin-bottom: 15px;
    }

    @media (max-width: 768px) {
        .grid-2 { grid-template-columns: 1fr; }
    }
</style>

<div class="page-title">Abstract & Presentation Guidelines</div>

@if(session('success'))
    <div class="success-alert">
        <i class="fa-solid fa-circle-check" style="font-size: 1.2rem;"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<form method="POST" action="{{ route('admin.guidelines.update') }}">
    @csrf

    <!-- SECTION 1: ABSTRACT SUBMISSION -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-file-lines"></i>
                1. Abstract Submission (Primary Guidelines)
            </div>
            <button type="button" class="btn-add" onclick="addAbstractItem()">
                <i class="fa-solid fa-plus"></i> Add Bullet Item
            </button>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Header Badge Tagline</label>
                <input type="text" name="abstract_tag" class="form-control" value="{{ $settings['abstract_tag'] ?? 'PRIMARY GUIDELINES' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Section Heading Title</label>
                <input type="text" name="abstract_title" class="form-control" value="{{ $settings['abstract_title'] ?? 'Abstract Submission' }}">
            </div>
        </div>

        <h4 style="font-size: 1rem; color: #1e293b; margin: 15px 0 15px; font-weight: 700;">Submission Guidelines Bullet Points</h4>

        <div id="abstract-items-wrapper">
            @for($i = 1; $i <= 20; $i++)
                @if(isset($settings['abstract_item_' . $i]))
                <div class="card-box-item">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <div class="badge-item"><i class="fa-solid fa-check"></i> Guideline Item</div>
                        <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <input type="text" name="abstract_items[]" class="form-control" value="{{ $settings['abstract_item_' . $i] }}">
                    </div>
                </div>
                @endif
            @endfor
        </div>
    </div>

    <!-- SECTION 2: ORAL PRESENTATION -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-chalkboard-user"></i>
                2. Oral Presentation Guidelines
            </div>
            <button type="button" class="btn-add" onclick="addOralItem()">
                <i class="fa-solid fa-plus"></i> Add Rule Item
            </button>
        </div>

        <div class="form-group">
            <label class="form-label">Card Title</label>
            <input type="text" name="oral_title" class="form-control" value="{{ $settings['oral_title'] ?? 'Oral Presentation' }}">
        </div>

        <div id="oral-items-wrapper">
            @for($i = 1; $i <= 20; $i++)
                @if(isset($settings['oral_item_' . $i]))
                <div class="card-box-item">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <div class="badge-item"><i class="fa-solid fa-circle-check"></i> Oral Rule</div>
                        <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <input type="text" name="oral_items[]" class="form-control" value="{{ $settings['oral_item_' . $i] }}">
                    </div>
                </div>
                @endif
            @endfor
        </div>
    </div>

    <!-- SECTION 3: POSTER PRESENTATION -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-image"></i>
                3. Poster Presentation & Dimensions
            </div>
            <button type="button" class="btn-add" onclick="addPosterItem()">
                <i class="fa-solid fa-plus"></i> Add Rule Item
            </button>
        </div>

        <div class="form-group">
            <label class="form-label">Card Title</label>
            <input type="text" name="poster_title" class="form-control" value="{{ $settings['poster_title'] ?? 'Poster Presentation' }}">
        </div>

        <div id="poster-items-wrapper">
            @for($i = 1; $i <= 20; $i++)
                @if(isset($settings['poster_item_' . $i]))
                <div class="card-box-item">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <div class="badge-item"><i class="fa-solid fa-circle-check"></i> Poster Rule</div>
                        <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <input type="text" name="poster_items[]" class="form-control" value="{{ $settings['poster_item_' . $i] }}">
                    </div>
                </div>
                @endif
            @endfor
        </div>

        <div class="card-box-item" style="background: #e6f7f5; border-color: #b2dfdb;">
            <div class="badge-item" style="background: #00796b;">
                <i class="fa-solid fa-ruler-combined"></i> Poster Dimensions Box
            </div>
            <div class="grid-2">
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label">Dimensions Label</label>
                    <input type="text" name="poster_dim_label" class="form-control" value="{{ $settings['poster_dim_label'] ?? 'POSTER DIMENSIONS' }}">
                </div>
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label">Dimensions Value</label>
                    <input type="text" name="poster_dim_val" class="form-control" value="{{ $settings['poster_dim_val'] ?? '90 cm (Width) × 120 cm (Height)' }}">
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 4: SCIENTIFIC PUBLICATIONS -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-book-open"></i>
                4. Scientific Publications Block
            </div>
            <button type="button" class="btn-add" onclick="addPubItem()">
                <i class="fa-solid fa-plus"></i> Add Channel Card
            </button>
        </div>

        <div class="form-group">
            <label class="form-label">Section Heading Title</label>
            <input type="text" name="pub_title" class="form-control" value="{{ $settings['pub_title'] ?? 'Scientific Publications' }}">
        </div>

        <div class="form-group">
            <label class="form-label">Section Subtitle / Description</label>
            <textarea name="pub_desc" class="form-control" rows="2">{{ $settings['pub_desc'] ?? 'Selected peer-reviewed manuscripts will be considered for publication in our partnering international journals and indexed proceedings, offering global visibility for your research.' }}</textarea>
        </div>

        <div id="pub-items-wrapper">
            @for($i = 1; $i <= 20; $i++)
                @if(isset($settings['pub_' . $i . '_title']))
                <div class="card-box-item">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <div class="badge-item"><i class="fa-solid fa-newspaper"></i> Publication Channel</div>
                        <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Journal / Channel Title</label>
                        <input type="text" name="pub_titles[]" class="form-control" value="{{ $settings['pub_' . $i . '_title'] }}">
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Description</label>
                        <textarea name="pub_descs[]" class="form-control" rows="2">{{ $settings['pub_' . $i . '_desc'] ?? '' }}</textarea>
                    </div>
                </div>
                @endif
            @endfor
        </div>
    </div>

    <!-- Sticky Save Button -->
    <div style="position: sticky; bottom: 20px; z-index: 100; text-align: right; background: rgba(255,255,255,0.9); padding: 15px; border-radius: 12px; box-shadow: 0 5px 25px rgba(0,0,0,0.1); backdrop-filter: blur(8px); border: 1px solid #e2e8f0;">
        <button type="submit" class="btn-save">
            <i class="fa-solid fa-floppy-disk"></i> Save Guidelines Settings
        </button>
    </div>
</form>

<script>
function addAbstractItem() {
    const html = `
    <div class="card-box-item">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
            <div class="badge-item"><i class="fa-solid fa-check"></i> New Guideline Item</div>
            <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
        </div>
        <div class="form-group" style="margin-bottom: 0;">
            <input type="text" name="abstract_items[]" class="form-control" placeholder="Enter guideline item (e.g. <strong>Word Limit:</strong> 250-300 words)">
        </div>
    </div>`;
    document.getElementById('abstract-items-wrapper').insertAdjacentHTML('beforeend', html);
}

function addOralItem() {
    const html = `
    <div class="card-box-item">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
            <div class="badge-item"><i class="fa-solid fa-circle-check"></i> New Oral Rule</div>
            <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
        </div>
        <div class="form-group" style="margin-bottom: 0;">
            <input type="text" name="oral_items[]" class="form-control" placeholder="Enter oral presentation rule">
        </div>
    </div>`;
    document.getElementById('oral-items-wrapper').insertAdjacentHTML('beforeend', html);
}

function addPosterItem() {
    const html = `
    <div class="card-box-item">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
            <div class="badge-item"><i class="fa-solid fa-circle-check"></i> New Poster Rule</div>
            <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
        </div>
        <div class="form-group" style="margin-bottom: 0;">
            <input type="text" name="poster_items[]" class="form-control" placeholder="Enter poster presentation rule">
        </div>
    </div>`;
    document.getElementById('poster-items-wrapper').insertAdjacentHTML('beforeend', html);
}

function addPubItem() {
    const html = `
    <div class="card-box-item">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
            <div class="badge-item"><i class="fa-solid fa-newspaper"></i> New Publication Channel</div>
            <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
        </div>
        <div class="form-group">
            <label class="form-label">Journal / Channel Title</label>
            <input type="text" name="pub_titles[]" class="form-control" placeholder="Title">
        </div>
        <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label">Description</label>
            <textarea name="pub_descs[]" class="form-control" rows="2" placeholder="Description"></textarea>
        </div>
    </div>`;
    document.getElementById('pub-items-wrapper').insertAdjacentHTML('beforeend', html);
}
</script>
@endsection
