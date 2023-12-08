<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/home.css"> 
    <link rel="stylesheet" href="../css/navfoot.css"> 
</head>
<body>
    <div class="navbar">
        <?php include '../html/nav.html'; ?>
    </div>
    <div class="container">
            <div class="background-image">
                <div class="text-content">
                <h1>Welcome to Our Blogs Platform</h1>

                    <div class="description">
                        <p>Share your thoughts, experiences, and ideas with the world. Connect with other users and explore a variety of blog posts. Whether it's personal stories, informative articles, or creative writing, our platform is your space to express yourself.</p>
                    </div>
                </div>
            </div>
        
    </div>

    <footer>
        <?php include '../html/footer.html'; ?>
    </footer>
<style>
    
    body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            overflow: hidden;
        }

        .background-image {
            background-image: url('../imgs/image.jpeg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            z-index: -1;

        }

        .text-content {
            text-align: center;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 0px;
            margin: top 0%;
            color: rgb(146, 99, 49);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .description {
            font-size: 1.2rem;
            line-height: 1.6;
            width: 40%;
            float: right;
            text-align: justify;  
            margin-right:100px;    
        
        }

    
</style>

</body>
</html>
