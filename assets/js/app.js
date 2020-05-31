/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../styles/app.scss';

import {Votes} from './components/votes';

const votingOptions = {
  voteContainer: '.js-vote-arrows',
  voteTotals: '.js-vote-total',
};

const votes = new Votes(votingOptions);

if(document.querySelectorAll(votingOptions.voteContainer).length) {
 [...document.querySelectorAll('.js-vote')].map((element) => {
   element.addEventListener('click', (event) => {
     event.preventDefault();
     votes.vote(element.getAttribute('data-direction'), event);
   });
 });
}
