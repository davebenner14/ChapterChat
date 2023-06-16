@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-semibold mb-4">Add Review</h1>
        <form action="{{ route('reviews.store', ['book' => $book->id]) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="rating" class="block text-gray-700 text-sm font-bold mb-2">Rating:</label>
                <div class="star-rating">
                    <span class="fa fa-star" data-rating="1"></span>
                    <span class="fa fa-star" data-rating="2"></span>
                    <span class="fa fa-star" data-rating="3"></span>
                    <span class="fa fa-star" data-rating="4"></span>
                    <span class="fa fa-star" data-rating="5"></span>
                    <input type="hidden" name="rating" class="rating-value" value="0">
                </div>
            </div>
            <div class="mb-4">
                <label for="review" class="block text-gray-700 text-sm font-bold mb-2">Review:</label>
                <textarea name="review" id="review" rows="5" class="w-full px-3 py-2 border rounded text-gray-800"></textarea>
            </div>
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <div>
                <button type="submit" style="display: inline-block; background-color: #32CD32; color: white; padding: 8px 16px; border-radius: 4px; text-align: center; text-decoration: none; font-weight: 600;">Submit Review</button>
                <a href="{{ route('books.show', $book) }}" style="display: inline-block; background-color: #808080; color: white; padding: 8px 16px; border-radius: 4px; text-align: center; text-decoration: none; font-weight: 600;">Cancel</a>
            </div>
            
        </form>
    </div>

    <style>
        .star-rating {
            display: flex;
            justify-content: center;
        }

        .star-rating .fa-star {
            font-size: 24px;
            color: #ccc;
            cursor: pointer;
        }

        .star-rating .fa-star.selected,
        .star-rating .fa-star:hover {
            color: #ffcc00;
        }
    </style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var setRating = function(value) {
            $('.star-rating .fa-star').each(function() {
                if ($(this).data('rating') <= value) {
                    $(this).addClass('selected');
                } else {
                    $(this).removeClass('selected');
                }
            });
        }
    
        $('.star-rating .fa-star').hover(
            function() { setRating($(this).data('rating')); }, // mouseover
            function() { setRating($('input.rating-value').val()); } // mouseout
        );
    
        $('.star-rating .fa-star').on('click', function() {
            var rating = $(this).data('rating');
            $('input.rating-value').val(rating);
            setRating(rating);
        });
    });
    </script>
    



@endsection
