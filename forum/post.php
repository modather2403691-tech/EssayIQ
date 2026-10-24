<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EssayIQ - Discussion</title>

    <link rel="stylesheet" href="../assets/css/forum.css">

</head>

<body>

<!-- =========================
     NAVBAR
========================= -->

<nav class="forum-navbar">

    <div class="forum-brand">

        <img
            src="../assets/images/EssayIQ AI Grading Logo.png"
            alt="EssayIQ Logo"
            class="forum-brand-logo"
        >

    </div>


    <div class="forum-nav-links">

        <a href="../index.php">
            Home
        </a>

        <a href="index.php">
            Forum
        </a>

        <a href="#">
            Logout
        </a>

    </div>

</nav>


<!-- =========================
     MAIN CONTENT
========================= -->

<main class="post-page-container">


    <!-- Back Button -->

    <a href="index.php" class="back-to-forum">
        ← Back to Forum
    </a>


    <!-- =========================
         ORIGINAL POST
    ========================= -->

    <article class="discussion-card">


        <div class="post-user">

            <div class="avatar student-avatar">
                AM
            </div>

            <div>

                <strong>
                    Ahmed Mohamed
                </strong>

                <span>
                    Student · 10 minutes ago
                </span>

            </div>

        </div>


        <div class="discussion-category">
            Question
        </div>


        <h1>
            How can I improve my essay coherence?
        </h1>


        <p class="discussion-text">

            I have good ideas, but my paragraphs don't connect smoothly.
            What should I do?

        </p>


        <div class="discussion-actions">

            <button
                class="discussion-like-btn"
                id="mainLikeBtn"
            >
                ♡ <span id="mainLikeCount">5</span> likes
            </button>

            <span>
                💬 3 replies
            </span>

        </div>

    </article>



    <!-- =========================
         REPLIES
    ========================= -->

    <section class="replies-section">


        <div class="replies-header">

            <h2>
                3 Replies
            </h2>

            <span>
                Discussion
            </span>

        </div>



        <!-- =========================
             STUDENT REPLY
        ========================= -->

        <article class="reply-card">


            <div class="reply-user">

                <div class="avatar student-avatar">
                    SJ
                </div>

                <div>

                    <strong>
                        Sarah James
                    </strong>

                    <span>
                        Student · 5 minutes ago
                    </span>

                </div>

            </div>


            <p>

                Try using transition words such as
                <strong>however</strong>,
                <strong>furthermore</strong>, and
                <strong>therefore</strong>.

                Make sure each paragraph connects
                to your main argument.

            </p>


            <button class="reply-like-btn">

                ♡ <span>3</span>

            </button>

        </article>



        <!-- =========================
             STUDENT REPLY
        ========================= -->

        <article class="reply-card">


            <div class="reply-user">

                <div class="avatar student-avatar">
                    MK
                </div>

                <div>

                    <strong>
                        Michael Khan
                    </strong>

                    <span>
                        Student · 3 minutes ago
                    </span>

                </div>

            </div>


            <p>

                You can also start each paragraph with a
                clear topic sentence. This makes the relationship
                between your ideas easier to understand.

            </p>


            <button class="reply-like-btn">

                ♡ <span>2</span>

            </button>

        </article>



        <!-- =========================
             INSTRUCTOR REPLY
        ========================= -->

        <article class="reply-card instructor-reply">


            <div class="reply-user">

                <div class="avatar instructor-avatar">
                    🎓
                </div>

                <div>

                    <strong>
                        Dr. Sara
                    </strong>

                    <span class="instructor-label">
                        Instructor
                    </span>

                </div>

            </div>


            <p>

                Try using transition words such as
                <strong>however</strong>,
                <strong>furthermore</strong>, and
                <strong>therefore</strong>.

                Also make sure that every paragraph has
                a clear purpose and supports your main argument.

            </p>


            <button class="reply-like-btn">

                ♡ <span>5</span>

            </button>

        </article>


    </section>



    <!-- =========================
         WRITE REPLY
    ========================= -->

    <section class="write-reply-section">


        <h2>
            Join the Discussion
        </h2>

        <p>
            Share your answer or help another student.
        </p>


        <textarea
            id="replyInput"
            placeholder="Write your reply..."
        ></textarea>


        <div class="reply-form-footer">

            <span id="replyMessage"></span>

            <button
                class="submit-reply-btn"
                id="submitReplyBtn"
            >
                Post Reply
            </button>

        </div>


    </section>


</main>


<script src="../assets/js/forum.js"></script>

</body>

</html>