<div id="{{ $modalId }}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full backdrop-blur-sm bg-black bg-opacity-25 hidden">
    <div class="bg-teal-50 rounded-lg shadow-xl w-full max-w-lg ">
        <div
            class="bg-gradient-to-r from-teal-400 to-teal-600 p-6 pt-4 pb-2 flex items-center justify-center rounded-t-lg">
            <i class="fas fa-star pr-2 text-white"></i>
            <h2 class="text-2xl font-semibold text-white text-center">Leave a Review</h2>
        </div>


        <div class="p-8">
            <form action="{{ $route }}" method="POST">
                @csrf

                <div class="my-4">
                    <label for="service_type" class="block text-lg font-semibold text-teal-600 text-left">Service
                        Type:</label>
                    <select name="service_type" id="service_type"
                        class="w-full text-teal-600 p-2 border border-teal-600 rounded-lg mb-4">
                        <option value="Dental Checkup">Dental Checkup</option>
                        <option value="Tooth Extraction">Tooth Extraction</option>
                        <option value="Dental Cleaning">Dental Cleaning</option>
                        <option value="Dental Filling">Dental Filling</option>
                        <option value="Root Canal Treatment">Root Canal Treatment</option>
                        <option value="Dental Crown">Dental Crown</option>
                        <option value="Dental Implant">Dental Implant</option>
                        <option value="Orthodontic Treatment">Orthodontic Treatment</option>
                        <option value="Teeth Whitening">Teeth Whitening</option>
                        <option value="Dental Surgery">Dental Surgery</option>
                        <option value="Other">Other</option>
                    </select>
                </div>


                <div id="star-rating" class="flex mb-4 space-x-8 justify-center">
                    <i class="fas fa-star fa-2x text-gray-400 cursor-pointer" data-value="1"></i>
                    <i class="fas fa-star fa-2x text-gray-400 cursor-pointer" data-value="2"></i>
                    <i class="fas fa-star fa-2x text-gray-400 cursor-pointer" data-value="3"></i>
                    <i class="fas fa-star fa-2x text-gray-400 cursor-pointer" data-value="4"></i>
                    <i class="fas fa-star fa-2x text-gray-400 cursor-pointer" data-value="5"></i>
                </div>

                <!-- Add Sad and Happy Faces for Rating -->
                <div id="face-rating" class="flex  space-x-28    justify-center mt-4">
                    <i class="fas fa-frown fa-2x text-gray-400 cursor-pointer" data-value="1"></i>
                    <i class="fas fa-meh fa-2x text-gray-400 cursor-pointer" data-value="3"></i>
                    <i class="fas fa-smile fa-2x text-gray-400 cursor-pointer" data-value="5"></i>
                </div>

                <p id="star-count" class="text-center text-lg text-teal-600 font-semibold mt-2">0 Stars</p>

                <script>
                    const stars = document.querySelectorAll('#star-rating i');
                    const faces = document.querySelectorAll('#face-rating i');
                    const starCountDisplay = document.getElementById('star-count');
                    let rating = 0; 

                    stars.forEach(star => {
                        star.addEventListener('mouseover', () => {
                            stars.forEach(star => {
                                if (star.getAttribute('data-value') <= hoveredRating) {
                                    star.classList.add('text-yellow-400');
                                    star.classList.remove('text-gray-400');
                                } else {
                                    star.classList.remove('text-yellow-400');
                                    star.classList.add('text-gray-400');
                                }
                            });
                            updateFaceRating(hoveredRating); // Update faces based on star value
                        });

                        star.addEventListener('mouseout', () => {
                            updateStarColors(rating);
                            updateFaceRating(rating);
                        });

                        star.addEventListener('click', () => {
                            rating = star.getAttribute('data-value');
                            updateStarColors(rating);
                            updateFaceRating(rating);
                            starCountDisplay.textContent = `${rating} Star${rating > 1 ? 's' : ''} out of 5 stars`;
                        });
                    });

                    function updateStarColors(rating) {
                        stars.forEach(star => {
                            const starValue = parseFloat(star.getAttribute('data-value'));
                            if (starValue <= rating) {
                                star.classList.add('text-yellow-400');
                                star.classList.remove('text-gray-400');
                            } else {
                                star.classList.remove('text-yellow-400');
                                star.classList.add('text-gray-400');
                            }
                        });
                    }

                    function updateFaceRating(rating) {
                        faces.forEach(face => {
                            const faceValue = parseFloat(face.getAttribute('data-value'));
                            if (faceValue <= rating) {
                                face.classList.add('text-teal-400');
                                face.classList.remove('text-gray-400');
                            } else {
                                face.classList.remove('text-teal-400');
                                face.classList.add('text-gray-400');
                            }
                        });
                    }
                </script>

                <!-- Review Textarea -->
                <div class="mt-8">
                    <label for="review" class="block text-lg font-semibold text-teal-600 text-left">Write a
                        Review:</label>
                    <textarea name="review" id="review" rows="4"
                        class="w-full p-2 border border-teal-600 rounded-lg mb-4"
                        placeholder="Share your experience..."></textarea>
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