<div id="{{ $modalId }}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full backdrop-blur-sm bg-black bg-opacity-25 hidden">
    <div class="bg-teal-50 rounded-lg shadow-xl w-full max-w-lg">
        <div
            class="bg-gradient-to-r from-teal-400 to-teal-600 p-6 pt-4 pb-2 flex items-center justify-center rounded-t-lg">
            <i class="fas fa-star pr-2 text-white"></i>
            <h2 class="text-2xl font-semibold text-white text-center">Leave a Review</h2>
        </div>


        <div class="p-8">

            <form action="{{ $route }}" method="POST" id="reviewForm">
                @csrf
                <div class="my-6">
                    <label for="service" class="block text-xl font-semibold text-teal-600 text-left">Services:</label>
                    <ul
                        class="list-disc font-semibold text-left space-y-2 border-teal-500 border-r-4 bg-gradient-to-r from-blue-50 to-teal-100  list-inside text-teal-600 shadow-lg  rounded-lg p-2">
                        @foreach (explode(',', $services) as $service)
                            <li>{{ trim($service) }}</li>
                        @endforeach
                    </ul>
                </div>

                <div id="star-rating" class="flex mb-4 space-x-8 justify-center">
                    <i class="fas fa-star fa-2x text-gray-400 cursor-pointer" data-value="1"></i>
                    <i class="fas fa-star fa-2x text-gray-400 cursor-pointer" data-value="2"></i>
                    <i class="fas fa-star fa-2x text-gray-400 cursor-pointer" data-value="3"></i>
                    <i class="fas fa-star fa-2x text-gray-400 cursor-pointer" data-value="4"></i>
                    <i class="fas fa-star fa-2x text-gray-400 cursor-pointer" data-value="5"></i>
                </div>

                <input type="hidden" name="rating_input" id="rating_input" value="">

                <!-- Add Sad and Happy Faces for Rating -->
                <div id="face-rating" class="flex  space-x-28    justify-center mt-4">
                    <i class="fas fa-frown fa-2x text-gray-400 cursor-pointer" data-value="1"></i>
                    <i class="fas fa-meh fa-2x text-gray-400 cursor-pointer" data-value="3"></i>
                    <i class="fas fa-smile fa-2x text-gray-400 cursor-pointer" data-value="5"></i>
                </div>

                <p id="star-count" class="text-center text-lg text-teal-600 font-semibold mt-2"></p>
                <!-- Review Textarea -->
                <div class="mt-8">
                    <label for="review" class="block text-lg font-semibold text-teal-600 text-left">
                        Write a Review:
                    </label>
                    <textarea name="review" id="review" rows="4" class="w-full text-teal-600 p-2 border border-teal-600 rounded-lg mb-4 
                focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                            </textarea>

                </div>
        </div>

        <div class="flex justify-end space-x-2  rounded-b-lg  bg-gradient-to-r from-teal-200 to-emerald-600 p-4">
            <button type="button"
                class="bg-gradient-to-r from-red-400 to-red-500 text-white px-4 py-2 rounded-lg shadow hover:from-red-500 hover:to-red-600 transition"
                data-modal-hide="{{ $modalId }}">Cancel</button>

            <button type="submit"
                class="bg-gradient-to-r from-teal-600 to-teal-700 text-white px-4 py-2 rounded-lg shadow hover:from-teal-700 hover:to-teal-800 transition">
                Submit Review
            </button>
        </div>

        </form>
    </div>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        const stars = document.querySelectorAll("#star-rating i");
        const faces = document.querySelectorAll("#face-rating i");
        const ratingInput = document.getElementById("rating_input");
        let rating = 0;

        // Function to update star colors
        function updateStarColors(value) {
            stars.forEach(star => {
                let starValue = parseInt(star.getAttribute("data-value"));
                if (starValue <= value) {
                    star.classList.add("text-yellow-400");
                    star.classList.remove("text-gray-400");
                } else {
                    star.classList.remove("text-yellow-400");
                    star.classList.add("text-gray-400");
                }
            });
        }

        // Function to update face colors
        function updateFaceColors(value) {
            faces.forEach(face => {
                let faceValue = parseInt(face.getAttribute("data-value"));
                if (
                    (value <= 2 && faceValue === 1) || // Sad face for 1-2 stars
                    (value === 3 && faceValue === 3) || // Neutral face for 3 stars
                    (value >= 4 && faceValue === 5) // Happy face for 4-5 stars
                ) {
                    face.classList.add("text-teal-400");
                    face.classList.remove("text-gray-400");
                } else {
                    face.classList.remove("text-teal-400");
                    face.classList.add("text-gray-400");
                }
            });
        }

        // Add event listeners to stars
        stars.forEach(star => {
            star.addEventListener("mouseover", function () {
                let hoveredRating = parseInt(this.getAttribute("data-value"));
                updateStarColors(hoveredRating);
                updateFaceColors(hoveredRating);
                document.getElementById("star-count").textContent =
                    `${rating} Star${rating > 1 ? 's' : ''} out of 5`;
            });

            star.addEventListener("mouseout", function () {
                updateStarColors(rating);
                updateFaceColors(rating);
                document.getElementById("star-count").textContent =
                    `${rating} Star${rating > 1 ? 's' : ''} out of 5`;

            });

            star.addEventListener("click", function () {
                rating = parseInt(this.getAttribute("data-value"));
                updateStarColors(rating);
                updateFaceColors(rating);
                ratingInput.value = rating; // Store rating in input field
                document.getElementById("star-count").textContent =
                    `${rating} Star${rating > 1 ? 's' : ''} out of 5`;

            });
        });
    });
</script>