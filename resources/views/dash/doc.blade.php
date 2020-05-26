@extends('layouts.dash')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <h4 class="card-title">Documentation</h4>
            <h1>Sommaire</h1>
            <ol>
                <li><a href="#introduction">Introduction</a></li>
                <li><a href="#premiers-pas">Premiers pas</a>
                    <ol>
                        <li><a href="#installation">Installation</a></li>
                        <li><a href="#créer-une-application">Créer une application</a></li>
                    </ol>
                </li>
                <li><a href="#implémentation">Implémentation</a>
                    <ol>
                        <li><a href="#bouton-de-connexion">Bouton de connexion</a>
                            <ol>
                                <li><a href="#par-défaut">Par défaut</a></li>
                                <li><a href="#alternative">Alternative</a></li>
                                <li><a href="#pensez-à-laccessibilité">Pensez à l'accessibilité</a></li>
                                <li><a href="#exemple-de-code">Exemple de code</a></li>
                            </ol>
                        </li>
                        <li><a href="#acquisition-des-données">Acquisition des données</a>
                            <ol>
                                <li><a href="#introduction-1">Introduction</a></li>
                                <li><a href="#appel-api">Appel API</a></li>
                                <li><a href="#réponse-api-lors-de-linscription">Réponse API lors de l'inscription</a>
                                </li>
                                <li><a href="#que-faire-avec-la-réponse-">Que faire avec la réponse ?</a></li>
                                <li><a href="#lors-des-connexions-suivantes">Lors des connexions suivantes</a></li>
                            </ol>
                        </li>
                        <li><a href="#résumé-en-image">Résumé en image</a></li>
                        <li><a href="#faites-attention-à-labsence-de-mot-de-passe">Faites attention à l'absence de mot
                                de passe</a></li>
                        <li><a href="#exemples">Exemples</a></li>
                    </ol>
                </li>
                <li><a href="#questions-fréquentes">Questions fréquentes</a></li>
                <li><a href="#chez-moi-cela-ne-fonctionne-pas-correctement-que-faire-">Chez moi cela ne fonctionne pas
                        correctement, que faire ?</a></li>
            </ol>
            <h1 id="introduction">Introduction</h1>
            <p><strong>JustAuthMe</strong> est un fournisseur d'identité en ligne fonctionnant sans le besoin d'aucun
                mot de passe. Nous permettons à tout un chacun de se connecter sans effort à n'importe quel site web
                utilisant notre solution. Nous fournissons une application mobile à nos utilisateurs et une API à nos
                clients qui souhaitent intégrer la solution à leur site web.</p>
            <p>Véritable alternative respectueuse de la vie privée aux différents systèmes de connexion des réseaux
                sociaux, <strong>JustAuthMe</strong> innove en supprimant entièrement le concept du mot de passe. Nos
                utilisateurs sont authentifiés par les systèmes biométriques de leur smartphones et nos clients
                s'assurent d'acquérir des utilisateurs humains avec des informations authentiques vérifiées et via un
                processus simplifié à l'extrême. Une vidéo de présentation est disponible sur <a
                    href="https://www.youtube.com/watch?v=Z54dVXdGLqk">Youtube</a>.</p>
            <h1 id="premiers-pas">Premiers pas</h1>
            <h2 id="installation">Installation</h2>
            <p><strong>JustAuthMe</strong> ne nécessite aucune installation particulière car un bouton vers un lien
                spécifique et un appel à notre API suffisent à faire fonctionner la solution. Nous avons néanmoins mis
                en place des SDK pour certains des langages les plus utilisés, que vous trouverez ci-dessous:</p>
            <ul>
                <li>SDK PHP: <a href="https://github.com/JustAuthMe/PHP-SDK/">github.com/JustAuthMe/PHP-SDK</a></li>
            </ul>
            <h2 id="créer-une-application">Créer une application</h2>
            <p>Pour fonctionner sur votre site, <strong>JustAuthMe</strong> a besoin d'avoir connaissance de votre site.
                Pour cela il va vous falloir créer une application sur notre console pour développeurs, disponible ici:
                <a href="https://developers.justauth.me">https://developers.justauth.me</a>. Pour créer une application
                <strong>JustAuthMe</strong> pour votre site, vous aurez besoin des éléments suivants:</p>
            <ul>
                <li>Le nom de votre site</li>
                <li>Un logo au format 512x512 px
                    <ul>
                        <li>À noter que dans l'application, le logo sera affiché sous forme de disque, les coins seront
                            donc rognés
                        </li>
                    </ul>
                </li>
                <li>Le nom de domaine auquel répond votre site</li>
                <li>Une URL de callback où seront envoyés les token d'accès aux informations des utilisateurs
                    <ul>
                        <li>Cette URL doit obligatoirement être au format HTTPS et se trouver sur le même nom de domaine
                            que votre site
                        </li>
                    </ul>
                </li>
            </ul>
            <p>Vous serez ensuite amené à choisir quelles informations vous désirez obtenir d'un utilisateur.
                Actuellement, <strong>JustAuthMe</strong> propose les informations suivantes à ses clients:</p>
            <ul>
                <li>Adresse E-Mail</li>
                <li>Nom</li>
                <li>Prénom</li>
                <li>Date de naissance (au format jj/mm/aaaa)</li>
                <li>Photo de profil (encodée en base64)</li>
            </ul>
            <p>Pour chacune des informations choisies, vous pourrez rendre leur usage obligatoire ou facultatif. Chaque
                utilisateur désireux de se connecter à votre site via <strong>JustAuthMe</strong> sera informé des
                informations dont vous avez besoin, et pourra choisir de ne pas partager celles que vous avez rendues
                facultatives.</p>
            <p>Une fois le processus complété, deux informations importantes vous seront communiquées:</p>
            <ul>
                <li>Une clé d'API, secrète, à garder en lieu sûr</li>
                <li>Une URL de connexion, publique, à laquelle vos futurs utilisateurs accèderont pour se connecter à
                    votre site
                </li>
            </ul>
            <h1 id="implémentation">Implémentation</h1>
            <h2 id="bouton-de-connexion">Bouton de connexion</h2>
            <h3 id="par-défaut">Par défaut</h3>
            <p>Une fois en possession de votre secret d'API et de votre URL de connexion, vous pouvez ajouter sur vos
                formulaires d'inscription et de connexion un bouton amenant l'utilisateur vers votre URL de connexion.
                Nous avons déjà fabriqué un bouton:</p>
            <p><img src="https://static.justauth.me/medias/button.png" alt="Se connecter avec JAM"/></p>
            <p>Vous pouvez le télécharger ou directement l'intégrer depuis notre plateforme: <a
                    href="https://static.justauth.me/medias/button.png">https://static.justauth.me/medias/button.png</a>
            </p>
            <h3 id="alternative">Alternative</h3>
            <p>Si vous ne souhaitez pas utiliser le bouton de connexion par défaut car celui-ci s'intègre mal dans votre
                charte graphique, vous pouvez élaborer votre propre bouton en suivant strictement les règles
                suivantes:</p>
            <ol>
                <li>Le texte du bouton doit être exactement &quot;Se connecter Avec JustAuthMe&quot;</li>
                <li>La couleur du texte du bouton doit être blanche (<code>#FFFFFF</code>)</li>
                <li>La couleur d'arrière-plan du bouton doit être exactement <code>#3498DB</code></li>
            </ol>
            <h3 id="pensez-à-laccessibilité">Pensez à l'accessibilité</h3>
            <p>N'oubliez pas d'inclure un attribut <code>alt="Se connecter avec JustAuthMe"</code> à la balise
                <code>img</code> contenant le bouton.</p>
            <h3 id="exemple-de-code">Exemple de code</h3>
            <pre><code class="language-html">&lt;a href="https://core.justauth.me/auth?app_id=...&amp;redirect_url=..."&gt;
    &lt;img src="https://static.justauth.me/medias/button.png" alt="Se connectecter avec JustAuthMe" /&gt;
&lt;/a&gt;</code></pre>
            <h2 id="acquisition-des-données">Acquisition des données</h2>
            <h3 id="introduction-1">Introduction</h3>
            <p>Une fois la connexion confirmée par l'application, la page de connexion redirige l'utilisateur vers votre
                URL de callback, avec un paramètre GET <code>access_token</code> qui doit tout de suite être utilisé
                pour récupérer les informations de l'utilisateur courant et le connecter. Chaque
                <code>access_token</code> n'est valable que 60 secondes.</p>
            <h3 id="appel-api">Appel API</h3>
            <p>Lors de la réception du <code>access_token</code> sur votre URL de callback, vous devez tout de suite
                faire un appel à <code>https://core.justauth.me/api/data?secret=[votre secret]&amp;access_token=[le
                    access_token reçu]</code>.</p>
            <h3 id="réponse-api-lors-de-linscription">Réponse API lors de l'inscription</h3>
            <p>Lors de la première utilisation de <strong>JustAuthMe</strong> par un utilisateur sur votre site, cet
                appel vous renverra une réponse au format JSON contenant les informations suivantes:</p>
            <pre><code class="language-json">{
    "status": "success",
    "jam_id": "xxxxxxxxxx",
    "data1": "value1",
    "data2": "value2",
    "...": "..."
}</code></pre>
            <ol>
                <li><code>status</code>: Le status de la réponse (s'accompagne d'un statut HTTP 200 OK)
                    <ol>
                        <li>Si le <code>status</code> vaut <code>success</code>, l'opération peut continuer</li>
                        <li>Si le <code>status</code> vaut <code>error</code>, l'opération a échoué</li>
                    </ol>
                </li>
                <li><code>jam_id</code>: Il s'agit de l'identifiant unique de l'utilisateur, il doit être conservé et
                    utilisé comme point de repère lors des prochaines connexion
                </li>
                <li>données: Le reste de la réponse correspond aux données que vous avez choisi de demander à vos
                    utilisateurs lors de la création de votre application <strong>JustAuthMe</strong> sur notre console
                    pour développeurs.
                </li>
            </ol>
            <p><em>À noter que si vous avez opter pour des données facultatives, vous devez vérifier leur présence dans
                    la réponse de l'API, l'utilisateur pourrait avoir refusé de partager une ou plusieurs données avec
                    vous, cela ne doit pas faire échouer l'inscription</em></p>
            <h3 id="que-faire-avec-la-réponse-">Que faire avec la réponse ?</h3>
            <p>Les données reçues doivent être <strong>conservées</strong> de votre côté et traitées comme une
                inscription à votre site, un nouvel utilisateur doit être créé dans votre base de données et le <code>jam_id</code>
                reçu doit y être associé.</p>
            <h3 id="lors-des-connexions-suivantes">Lors des connexions suivantes</h3>
            <p>Les prochaines fois que le même utilisateur se reconnectera à votre site en utilisant
                <strong>JustAuthMe</strong>, vous recevrez également un <code>access_token</code> et vous devrez
                également faire l'appel api à <code>/data</code>. En revanche, l'API ne retournera que le
                <code>jam_id</code> et non pas la totalité des informations de l'utilisateur. C'est pourquoi il est
                important de traiter ces informations dès la première connexion et de créer un profil utilisateur
                associé. Le <code>jam_id</code> reçu lors de toutes les prochaines connexion vous servira à trouver
                lequel de vos utilisateurs vous devez connecter.</p>
            <h2 id="résumé-en-image">Résumé en image</h2>
            <p>Pour bien comprendre le fonctionnement de notre solution, voici le diagramme de séquence du parcours
                d'authentification:</p>
            <p><img src="https://static.justauth.me/medias/auth_flow_fr.png"
                    alt="Parcours d&#039;authentification de JustAuthMe"/></p>
            <h2 id="faites-attention-à-labsence-de-mot-de-passe">Faites attention à l'absence de mot de passe</h2>
            <p>Comme notre solution est exempte de mot de passe, vous aurez probablement dans votre base de données un
                champ &quot;mot de passe&quot; laissé à vide pour les utilisateurs acquis via
                <strong>JustAuthMe</strong>. Il ne faut <strong>PAS</strong> que ce champ laissé vide permette un accès
                à ces comptes via votre formulaire de connexion sans renseigner de mot de passe. De la même manière,
                <strong>ne définissez pas</strong> un mot de passe par défaut pour ces comptes, il s'agit là d'une
                faille de sécurité majeure.</p>
            <h2 id="exemples">Exemples</h2>
            <p>Des exemples d'implémentation dans différents langages sont disponibles dans les SDK de ces derniers,
                listés plus haut.</p>
            <h1 id="questions-fréquentes">Questions fréquentes</h1>
            <h2>Le token d'accès aux données est-il réutilisable ?</h2>
            <p>Non. Le <code>access_token</code> reçu lors de chaque connexion est tout le temps différent et n'est
                valable que durant 60 secondes. Il ne sert qu'à valider l'appel API à <code>https://core.justauth.me/api/data</code>
                afin de récupérer les informations concernant l'utilisateur courant.</p>
            <h2>Quand dois-je connecter l'utilisateur ?</h2>
            <p>Dès que vous recevez le <code>access_token</code>, vous devez faire l'appel API à <code>/data</code> puis
                connecter l'utilisateur, le tout dans le même script / la même page.</p>
            <h2>Comment faire si j'ai besoin que l'utilisateur renseigne un pseudonyme ?</h2>
            <p>Comme nous ne pouvons pas prévoir à l'avance quel pseudonyme sera ou non disponible sur tel ou tel site,
                il vous appartient de demander à l'utilisateur de choisir un pseudonyme après sa première connexion via
                <strong>JustAuthMe</strong>.</p>
            <h2>Comment faire si l'utilisateur possède déjà un compte sur mon site ?</h2>
            <p>Pour répondre à cette problématique, vous devez lier le compte de cet utilisateur à son
                <code>jam_id</code>. Pour cela, il vous suffit de vérifier que l'adresse e-mail reçue lors de la
                première connexion avec avec <strong>JustAuthMe</strong> est présente dans votre base d'utilisateurs
                existants. Si tel est le cas, liez simplement le <code>jam_id</code> reçu à cet utilisateur. Pas
                d'inquiétude, les adresses e-mail que vous recevez ont été vérifiées en amont par
                <strong>JustAuthMe</strong>. Cela veut dire que si une adresse e-mail vous ai transmise, c'est qu'elle
                appartient bien à la personne qui souhaite se connecter à votre site. Vous pouvez donc lier cette
                personne à son compte existant.</p>
            <h2>Comment faire si je veux restreindre l'accès à mon site ?</h2>
            <p>Comme pour la problématique ci-dessus, c'est au niveau de l'adresse e-mail que cela se passe. Commencez
                par établir une liste des adresses e-mail autorisées à se connecter à votre site (peut-être tout
                simplement votre base actuelle d'utilisateurs). Une fois ceci fait, vous n'aurez plus qu'à vérifier que
                l'adresse e-mail reçue lors de la première connexion de chaque utilisateur via
                <strong>JustAuthMe</strong> correspond à une des adresses de la liste préalablement établie, puis à
                associer le <code>jam_id</code> reçu à cette adresse pour les prochaines connexions. Vous pouvez
                également imaginer un système d'invitations, là aussi basé sur l'adresse e-mail. Pas d'inquiétude, les
                adresses e-mail que vous recevez ont été vérifiées en amont par <strong>JustAuthMe</strong>. Cela veut
                dire que si une adresse e-mail vous ai transmise, c'est qu'elle appartient bien à la personne qui
                souhaite se connecter à votre site.</p>
            <h2>Comment faire si je souhaite me passer de JustAuthMe à l'avenir ?</h2>
            <p>Si vous comptez malheureusement nous quitter, les utilisateurs acquis grâce à <strong>JustAuthMe</strong>
                ne sont pas perdus ! Il leur suffira de passer par votre fonction &quot;Mot de passe oublié&quot; afin
                de leur permettre de définir un mot de passe propre à votre site et ainsi d'accéder à leur compte sans
                passer par notre application.</p>
            <h1 id="chez-moi-cela-ne-fonctionne-pas-correctement-que-faire-">Chez moi cela ne fonctionne pas
                correctement, que faire ?</h1>
            <p>Si vous rencontrez des difficultés à implémenter JustAuthMe, n'hésitez pas à ouvir une Issue Github
                ici-même, nous nous ferons un plaisir de vous venir en aide !</p>
        </div>
    </div>
@endsection
