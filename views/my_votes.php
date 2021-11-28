<!-- ***************************************************** User information ***************************************************** -->
<div class="container-fluid">
    <div class="container-lg mt-3 mt-lg-5">
        <div class="row">
            <!--*********** Image *********** -->

            <div class="col-md-4 text-sm-end text-center">
                <img src="<?php echo VIEWS_PATH ?>image/profile.png" alt="user_image" id="image_profile">
            </div>

            <!-- *********** member information *********** -->

            <div class="col-md-7 border border-2 border-dark fs-3 pt-3 filter mt-2 mt-sm-0">
                <p> Pseudo : <?php echo USERNAME ?>  </p>
                <p> Adresse mail : <?php echo EMAIL ?></p>
                <p> Statut : <?php echo TYPE ?> </p>
            </div>


        </div>
    </div>

</div>
<!-- ***************************************************** End of user information ***************************************************** -->


<!--  ***************************************************** Buttons ***************************************************** -->
<div class="container-fluid container-lg mt-5">
    <div class="row">
        <!-- ****************** Button my Ideas ****************** -->

        <div class="col-sm-3 text-center">
            <form action="index.php?action=my_ideas" method="post">
                <button class="btn fs-2 btn-secondary btn-lg" type="submit">Mes idées</button>
            </form>
        </div>

        <!--  ****************** Button my comments ****************** -->

        <div class="col-sm-5 text-center mt-3 mb-3 mt-sm-0 mb-sm-0">
            <form action="index.php?action=my_comments" method="post">
                <button class="btn fs-2 btn-secondary btn-lg" type="submit">Mes commentaires</button>
            </form>
        </div>


        <!-- ****************** Button my votes ****************** -->

        <div class="col-sm-3 text-center">
            <form action="index.php?action=my_votes" method="post">
                <button class="btn fs-2 btn-secondary btn-lg" type="submit"> Mes votes</button>
            </form>
        </div>

    </div>
</div>


<!--  ***************************************************** End of buttons ***************************************************** -->

<?php if (count($voteTable) == 0) { ?> <!-- if the user did not vote on any idea -->
    <p class="fs-1 mt-5 text-center text-danger"> Vous n'avez voté pour aucune idée! </p>
<?php } else {
    foreach ($voteTable as $i => $vote) { ?>
        <div class="container-fluid col-lg-10 border border-dark mt-4 mb-5 publication_idea">

            <!-- ********************  1. idea and member information  ********************  -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 container-fluid">
                        <div class="row">

                            <!-- image -->
                            <div class="col-2 col-sm-1">
                                <p><img
                                            src="<?php echo VIEWS_PATH ?>image/user.png" alt="user_image"
                                            class="user_image" "/>
                                </p>
                            </div>
                            <!-- end of image -->


                            <div class="idea_outline text-light fs-3 fw-bolder text-start col">
                                <!-- member information -->
                                <p>  <?php echo $vote->getIdea()->getMember()->getFrenchType() ?> :
                                    <?php echo $vote->getIdea()->getMember()->getHtmlUsername() ?> <br>
                                    <!-- end of member information -->

                                    <!-- submitted date -->
                                    <span class="fs-3 mx-4"> <?php echo $vote->getIdea()->formattedSubmittedDate() ?> </span>
                                </p>
                                   <!-- end of submitted date -->
                            </div>

                        </div>
                    </div>
                    <!-- status of idea -->
                    <p class="col-sm-4 text-sm-end mt-sm-4 text-center"><span
                                class="fs-3 bg-light btn-lg <?php echo $vote->getIdea()->getStatusColor() ?>"> <?php echo $vote->getIdea()->getFrenchStatus() ?> </span>
                    </p>
                    <!-- end of status of idea -->
                </div>
            </div>


            <!-- ********************  2. idea ********************  -->


            <div class="fs-3 text-center bg-light mx-5">
                <?php echo $vote->getIdea()->getHtmlText() ?>
            </div>


            <!-- ********************  3. form & number of votes ********************  -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8 container-fluid btn-group mb-lg-3">

                        <!-- button comments-->
                        <form class="mx-2" method="post"
                              action="index.php?action=comments&&idIdea=<?php echo $vote->getIdea()->getIdeaId() ?>">
                            <button class="idea_outline btn btn-light fs-5 btn-outline-warning text-dark border border-dark mt-3">
                                Commentaires
                            </button>
                        </form>
                        <!-- button comments-->

                    </div>

                    <!-- number of votes -->
                    <div class="idea_outline col-4 text-end mt-4 fs-3 text-light fw-bolder">
                        <p> <?php echo $vote->getIdea()->getNumberOfVotes() ?> vote(s)</p>
                    </div>
                    <!-- end of number of votes -->

                </div>
            </div>
        </div>
    <?php }
} ?>
<!-- ***************************************************** And of ideas ***************************************************** -->
