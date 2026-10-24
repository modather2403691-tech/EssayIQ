document.addEventListener("DOMContentLoaded", function () {


    // =========================
    // Like Buttons
    // =========================

    const likeButtons = document.querySelectorAll(".like-btn");

    likeButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            const number = button.querySelector("span");

            let likes = Number(number.textContent);

            if (button.classList.contains("liked")) {

                likes--;

                button.classList.remove("liked");

                button.style.color = "";

            } else {

                likes++;

                button.classList.add("liked");

                button.style.color = "#22d3ee";

            }

            number.textContent = likes;

        });

    });


    // =========================
    // Search Posts
    // =========================

    const searchInput =
        document.getElementById("searchPosts");

    const posts =
        document.querySelectorAll(".forum-post");


    searchInput.addEventListener("input", function () {

        const search =
            searchInput.value.toLowerCase();

        posts.forEach(function (post) {

            const text =
                post.textContent.toLowerCase();

            if (text.includes(search)) {

                post.style.display = "";

            } else {

                post.style.display = "none";

            }

        });

    });


    // =========================
    // Filter Posts
    // =========================

    const filter =
        document.getElementById("postFilter");


    filter.addEventListener("change", function () {

        const selected =
            filter.value;

        posts.forEach(function (post) {

            const type =
                post.dataset.type;

            if (
                selected === "all" ||
                selected === type
            ) {

                post.style.display = "";

            } else {

                post.style.display = "none";

            }

        });

    });


    // =========================
    // New Post
    // =========================

    const newPostButton =
        document.getElementById("newPostBtn");


    newPostButton.addEventListener("click", function () {

        alert(
            "New Post feature will be connected to the backend in Phase 2."
        );

    });

});

// =========================
// POST PAGE
// =========================


// Main post like

const mainLikeButton =
    document.getElementById("mainLikeBtn");

if (mainLikeButton) {

    mainLikeButton.addEventListener(
        "click",
        function () {

            const count =
                document.getElementById("mainLikeCount");

            let likes =
                Number(count.textContent);

            if (
                mainLikeButton.classList.contains("liked")
            ) {

                likes--;

                mainLikeButton.classList.remove("liked");

                mainLikeButton.style.color = "";

            } else {

                likes++;

                mainLikeButton.classList.add("liked");

                mainLikeButton.style.color =
                    "#22d3ee";

            }

            count.textContent = likes;

        }
    );

}


// Reply likes

const replyLikeButtons =
    document.querySelectorAll(".reply-like-btn");

replyLikeButtons.forEach(function (button) {

    button.addEventListener(
        "click",
        function () {

            const count =
                button.querySelector("span");

            let likes =
                Number(count.textContent);

            if (
                button.classList.contains("liked")
            ) {

                likes--;

                button.classList.remove("liked");

                button.style.color = "";

            } else {

                likes++;

                button.classList.add("liked");

                button.style.color =
                    "#22d3ee";

            }

            count.textContent = likes;

        }
    );

});


// =========================
// Submit Reply
// =========================

const submitReplyButton =
    document.getElementById("submitReplyBtn");

const replyInput =
    document.getElementById("replyInput");

const replyMessage =
    document.getElementById("replyMessage");


if (
    submitReplyButton &&
    replyInput &&
    replyMessage
) {

    submitReplyButton.addEventListener(
        "click",
        function () {

            const reply =
                replyInput.value.trim();


            if (reply === "") {

                replyMessage.textContent =
                    "Please write a reply first.";

                replyMessage.style.color =
                    "#f87171";

                return;

            }


            replyMessage.textContent =
                "Reply posted successfully!";

            replyMessage.style.color =
                "#4ade80";


            replyInput.value = "";


            setTimeout(function () {

                replyMessage.textContent = "";

            }, 3000);

        }
    );

}