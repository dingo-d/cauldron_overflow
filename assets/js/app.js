/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
import $ from 'jquery';

import {Votes} from './components/votes';

const votingOptions = {
  voteContainer: '.js-vote-arrows',
  voteTotals: '.js-vote-totals',
};

const votes = new Votes(votingOptions);

if($(votingOptions.voteContainer).length) {
 $('.js-vote-up').on('click', (e) => {
   e.preventDefault();
   votes.vote('up');
 });

 $('.js-vote-down').on('click', (e) => {
   e.preventDefault();
   votes.vote('down');
 });
}
