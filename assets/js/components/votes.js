import {bind} from 'decko';
import {fetch} from 'whatwg-fetch'

export class Votes {
  constructor(options) {
    this.container = options.voteContainer;
    this.totals = options.voteTotals;
    this.arrows = '.js-vote-arrows'

    this.METHOD = 'POST';
  }

  @bind
  vote(direction, event) {
    fetch(`/comments/10/vote/${direction}`, {
      method: this.METHOD,
    }).then((res) => res.json())
      .then((data) => {
        event.target.closest(this.arrows).querySelector(this.totals).innerText = data.votes;
      })
      .catch((err) => console.error(`Error: ${err}`));
  }


}
