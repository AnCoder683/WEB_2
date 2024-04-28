def greedy_assignment(C):
    n = len(C)
    assignment = [-1] * n  # Initialize assignment array with -1 indicating unassigned jobs
    assigned_jobs = set()  # Keep track of assigned jobs
    
    for person in range(n):
        min_cost = float('inf')
        min_job = -1
        print("person: ", person)
        for job in range(n):
            print("job: ",C[person][job])
            if job not in assigned_jobs and C[person][job] < min_cost:
                min_cost = C[person][job]
                min_job = job
                print("min_job: ", min_job)
        assignment[person] = min_job
        assigned_jobs.add(min_job)
    
    return assignment

# Example usage:
C = [
    [5, 8, 1, 8],
    [9, 2, 7, 8],
    [6, 4, 3, 7],
    [7, 6, 9, 4]
]

assignment = greedy_assignment(C)
print("Assignment:", assignment)
