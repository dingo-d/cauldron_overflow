/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../styles/app.scss';

const votingOptions = {
  voteContainer: '.js-vote-arrows',
  voteTotals: '.js-vote-total',
};

if(document.querySelectorAll(votingOptions.voteContainer).length) {
  import('./components/votes').then(({Votes}) => {

    const votes = new Votes(votingOptions);

    [...document.querySelectorAll('.js-vote')].map((element) => {
     element.addEventListener('click', (event) => {
       event.preventDefault();
       votes.vote(element.getAttribute('data-direction'), event);
     });
    });
  });
}
