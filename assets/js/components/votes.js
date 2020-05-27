import {bind} from 'decko';

export class Votes {
  constructor(options) {
    this.container = options.voteContainer;
    this.totals = options.voteTotals;

    this.method = 'POST';
  }

  @bind
  vote(direction) {
    $.ajax({
        url: `/comments/10/vote/${direction}`,
        method: this.method
      }).then(function (data) {
        $(this.totals).text(data.votes);
      });
  }


}
