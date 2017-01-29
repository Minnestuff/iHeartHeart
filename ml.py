from __future__ import print_function
import numpy as np
import statsmodels.api as sm
import matplotlib.pyplot as plt
from statsmodels.sandbox.regression.predstd import wls_prediction_std
import pandas as pd
import statsmodels.formula.api as smf

data = pd.read_csv('data.csv')
x = list(range(1, 1801))
y = data["Heart Beat"].values.tolist()
firstDiff = []
secondDiff = []
aFibBool = False

for idx,curVal in enumerate(y): 
    if idx == 0:
        firstDiff.append(y[idx+1] - y[idx])
    else:
        firstDiff.append(y[idx] - y[idx-1])
    if -29 >= firstDiff[-1] or firstDiff[-1] >= 29:
        aFibBool = True
        #print(firstDiff)

for idx,curVal in enumerate(firstDiff): 
    if idx == 0:
        secondDiff.append(abs(firstDiff[idx+1])-abs(firstDiff[idx]))
    else:
        secondDiff.append(abs(firstDiff[idx])-abs(firstDiff[idx-1]))

plt.scatter(x, firstDiff)
#print(secondDiff)
#plt.saveFig("secondDiffFig.png")
#plt.show()
#print(len(x))
#print(len(firstDiff))

a = np.array([y])
print("Standard Deviation", np.std(a))
np.std(a, axis=0)
np.std(a, axis=1)

print("First Diff")
lm = smf.ols('firstDiff ~ x', data=data).fit() 
print(lm.params)
print("Second Diff")
lm = smf.ols('secondDiff ~ x', data=data).fit() 
print(lm.params)
print ("Atrial Fibrillation:", str(aFibBool))
