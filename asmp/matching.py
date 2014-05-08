import numpy as np

# No. of mentors enrolled
mentors = int(input("Enter No. of Mentors registered:\n"))
# No. of students regsitered
mentees = int(input("Enter No. of Students registered:\n"))

# Mentee matrix which stores the preference position for each mentor based on profile matching 
# (i,j) represents jth Preference of ith student
mentee_pref = np.empty(shape=(0,mentors))
for i in range(mentees):
    # Input is preference points for ith mentee for all mentors
    c = list(map(int,(input("Enter mentors preference for %d th mentee:\n"% (i+1))).strip().split()))
    d = dict(zip(range(mentees),c))
    c = sorted(d,key=d.get,reverse=True)
    mentee_pref = np.insert(mentee_pref,(mentee_pref.shape)[0],c, axis = 0)

# Mentor matrix which stores the preference points for each mentee based on profile matching 
# (i,j) represents Preference of ith mentor for jth student
mentor_pref = np.empty(shape=(0,mentees))
for i in range(mentors):
    # Input is preference points for ith mentor for all mentees
    c = list(map(int,(input("Enter mentees preference for %d th mentor:\n"% (i+1))).strip().split()))
    mentor_pref = np.insert(mentor_pref,(mentor_pref.shape)[0],c, axis = 0)

# allotment array where a[i] is mentee allotted to ith mentor
allotment = [-1]*mentors
# keeps tracks of whether mentor alloted or not
alloted = [0]*mentees
# Implementation of Gale Shapley Matching Algorithm
change = 1
while (change!=0):
    change = 0
    for i in range(mentees):
        if(alloted[i] == 0):
            for j in range(mentors):
                k = int(mentee_pref[i][j])
                if(allotment[k] == -1):
                    allotment[k]=i
                    alloted[i]=1;
                    change += 1
                    break
                else:
                    if(mentor_pref[k][allotment[k]] < mentor_pref[k][i]):
                        alloted[allotment[k]]=0
                        allotment[k]=i
                        alloted[i]=1;
                        change += 1
                        break
for i in range(mentors):
    print("Mentor %d has been alloted Mentee %d"%(i,allotment[i]))
