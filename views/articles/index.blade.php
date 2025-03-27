@extends('layouts.app')

@section('content')
    <h2>Danh sách bài viết</h2>
    <a href="{{ route('articles.create') }}" class="btn btn-create mb-3"><i class="bi bi-plus-circle me-2"></i>Tạo bài viết mới</a>

    @foreach($articles as $article)
    <div class="card mb-3">
        <div class="row g-0">
            @if ($article->HinhAnh)
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $article->HinhAnh) }}" 
                         alt="{{ $article->TieuDe }}" 
                         class="img-fluid rounded-start"
                         style="width: 100%; height: 200px; object-fit: cover;">
                </div>
            @endif
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->TieuDe }}</h5>
                    <p class="card-text">{{ Str::limit($article->NoiDung, 300) }}</p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('articles.show', $article->MaBaiViet) }}" class="btn btn-view" data-bs-toggle="tooltip" data-bs-placement="top" title="Xem chi tiết"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('articles.edit', $article->MaBaiViet) }}" class="btn btn-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('articles.destroy', $article->MaBaiViet) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>

    <style>
        .btn-create {
            background: linear-gradient(135deg, rgb(30, 34, 34), rgb(59, 68, 71));
            color: white;
            border: none;
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-create:hover {
            background: linear-gradient(135deg, rgb(59, 68, 71), rgb(30, 34, 34));
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-view {
            background-color: rgb(43, 139, 154);
            color: white;
            border: none;
            border-radius: 45%;
            width: 50px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 400;
            transition: all 0.3s ease;
        }

        .btn-view:hover {
            background-color: rgb(25, 98, 109);
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-edit {
            background-color: rgb(20, 123, 77);
            color: white;
            border: none;
            border-radius: 45%;
            width: 50px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-edit:hover {
            background-color: rgb(15, 77, 36);
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 45%;
            width: 50px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-delete:hover {
            background-color: #c82333;
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn i {
            vertical-align: middle;
            font-size: 1.2rem;
        }

        .card-body .d-flex {
            margin-top: 1rem;
        }
    </style>
@endsection