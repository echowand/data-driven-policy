#Before running test.sh, open terminal and input "chmod +x test.sh" to get permission of running bash file.
#!/bin/bash
export PATH=/homes/du25/scratch/summer_research/data-driven-policy/mongodb/mongodb-linux-x86_64-2.6.3/bin:$PATH
mongod --dbpath /homes/du25/scratch/summer_research/data-driven-policy/mongodb/mongodb-linux-x86_64-2.6.3/data/db
