#!/bin/bash

curl -H "Content-Type: application/json" -X POST -d '
{
  "trigger": "commit",
  "payload": {
    "type": "SubversionCommit",
    "id": 807,
    "message": "Test change for phpci testing",
    "branch": "test",
    "author": {
      "name": "Ronan Chilvers",
      "email": "ronan@d3r.com"
    },
    "beanstalk_user": {
      "type": "Admin",
      "id": 161312,
      "login": "ronan",
      "email": "ronan@d3r.com",
      "name": "Ronan Chilvers"
    },
    "repository": {
      "id": 576756,
      "name": "hideaways",
      "title": "hideaways",
      "type": "SubversionRepository"
    },
    "changed_files": {
      "added": [

      ],
      "deleted": [

      ],
      "modified": [
        "trunk/queries.sql"
      ],
      "copied": [

      ]
    },
    "changed_dirs": {
      "added": [

      ],
      "deleted": [

      ],
      "modified": [

      ],
      "copied": [

      ]
    },
    "changeset_url": "https://d3r.beanstalkapp.com/hideaways/changesets/807",
    "committed_at": "2015-06-13 20:30:54 UTC"
  }
}' http://localhost:8080/webhook/beanstalk/3

# http://phpci.d3r.com/webhook/beanstalk/11
# http://localhost:8080/webhook/beanstalk/3

