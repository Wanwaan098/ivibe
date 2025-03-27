@extends('userlayouts.appp')

@section('title', 'Danh sách bài viết')

@section('styles')
    <style>
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            color: var(--text-dark);
            font-weight: 600;
            font-size: 1.5rem;
        }

        .card-text {
            color: black;
            font-size: 1.2rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, rgb(71, 63, 64), rgb(38, 36, 36));
            border: none;
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            color: #fff;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, rgb(184, 84, 100), rgb(124, 82, 88));
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .article-image {
            max-width: 300px;
            min-height: 250px; /* Thêm chiều cao tối thiểu để ảnh cao hơn */
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .article-content {
            flex: 1;
        }

        @media (max-width: 576px) {
            .card-body {
                flex-direction: column;
                align-items: flex-start;
            }

            .article-image {
                max-width: 100%;
            }
        }

        .btn i {
            vertical-align: middle;
            font-size: 1.2rem;
            margin-right: 0.5rem;
        }
    </style>
@endsection

@section('content')
    <h2>Danh sách bài viết</h2>
    @forelse($articles as $article)
        <div class="card">
            <div class="card-body">
                @if ($article->HinhAnh)
                    <img src="{{ asset('storage/' . $article->HinhAnh) }}" alt="{{ $article->TieuDe }}" class="article-image">
                @endif
                <div class="article-content">
                    <h5 class="card-title">{{ $article->TieuDe }}</h5>
                    <p class="card-text">{{ Str::limit($article->NoiDung, 450) }}</p>
                    <a href="{{ route('articless.show', $article->MaBaiViet) }}" class="btn btn-primary"><i class="bi bi-eye"></i> Xem chi tiết</a>
                </div>
            </div>
        </div>
    @empty
        <p>Chưa có bài viết nào.</p>
    @endforelse
@endsection