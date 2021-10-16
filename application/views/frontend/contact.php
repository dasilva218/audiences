 <!-- Page content-->
 <section class="py-5">
                <div class="container px-8">
                    <!-- Contact form-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Ecrivez-nous</h1>
                            <p class="lead fw-normal text-muted mb-0">Nous sommes impatients</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- * * SB Forms Contact Form * *-->
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- This form is pre-integrated with SB Forms.-->
                                <!-- To make this form functional, sign up at-->
                                <!-- https://startbootstrap.com/solution/contact-forms-->
                                <!-- to get an API token!-->

                                <!-- Hello Dasilva ! Merci de supprimer ce commentaire et les commentaires plus hauts une fois que tu auras finit s'il te plaît, j'ai préféré te laisser ça en cas de besoin lorsque tu vas utiliser le nouveau formulaire. Comme je ne maîtrise pas encore trop Js je n'ai pas voulu supprimer certaines data du formulaire telles que les classes des input et des labels, donc je te laisse gérer ça s'il te plaît. -->
                                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                                    <!-- Fullname-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="text" data-sb-validations="required" />
                                        <label for="name">Noms complet</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">Veuillez saisir votre nom.</div>
                                    </div>
                                    <!-- Email address -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" type="email" data-sb-validations="required,email" />
                                        <label for="email">Addresse email</label>
                                        <div class="invalid-feedback" data-sb-feedback="email:required">Veuillez saisir votre email.</div>
                                        <div class="invalid-feedback" data-sb-feedback="email:email">Email invalide.</div>
                                    </div>
                                    <!-- Subject -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="phone" type="text" data-sb-validations="required" />
                                        <label for="phone">Objet</label>
                                        <div class="invalid-feedback" data-sb-feedback="phone:required">Veuillez renseigner un objet.</div>
                                    </div>
                                    <!-- Message -->
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="message" type="text" style="height: 10rem" data-sb-validations="required"></textarea>
                                        <label for="message">Message</label>
                                        <div class="invalid-feedback" maxlength="" data-sb-feedback="message:required">Veuillez saisir un message.</div>
                                    </div>

                                    <!-- Submit success message-->
                                    <!-- has successfully submitted-->
                                    <div class="d-none" id="submitSuccessMessage">
                                        <div class="text-center mb-3">
                                            <div class="fw-bolder alert alert-success">Votre message a été envoyé avec succès !</div>
                                        </div>
                                    </div> 

                                    <!-- Submit error message -->
                                    <!-- an error submitting the form -->
                                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Une erreur c'est produite lors de l'envoi de votre demannde!</div></div>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Envoyer</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>