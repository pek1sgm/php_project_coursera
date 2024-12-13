# Git Workflow: Working with Forks and Main Repository

This workflow ensures seamless collaboration between a fork and the main repository.

---

## **1. Workflow: Working with the Fork Repository**

**Goal:** Make changes in the fork and transfer them to the main repository.

### **1.1 Keeping the Fork Updated (Main Repo to Fork)**  
Ensure the fork contains the latest changes from the main repository.

Run the following commands in your local repository (private fork):

```bash
# Switch to the main branch of the local fork
git checkout main

# Fetch the latest changes from the main repository (upstream)
git pull upstream main

# Sync the changes to your fork (origin)
git push origin main
```

### **1.2 Making Changes in the Fork**
Make changes in the fork and follow these steps:

```bash
# Create a new branch for your changes
git checkout -b new-branch-name

# Make changes and commit them
git add .
git commit -m "Description of changes"

# Push the changes to the fork
git push origin new-branch-name
```

### **1.3 Create a Pull Request**
- Navigate to your fork (`fork_user/php_project_coursera`).
- Create a **Pull Request** --> Send the changes to the main repository (`main_user/php_project_coursera`).

---

## **2. Workflow: Working with the Main Repository**

**Goal:** Retrieve changes merged from forks into the main repository and continue work.

### **2.1 Fetch Changes from the Main Repository**  
Synchronize the local main repository to retrieve merged changes:

```bash
# Switch to the main branch of the local main repo
git checkout main

# Fetch changes from the main repository
git pull origin main
```

### **2.2 Make Changes in the Main Repository**  
For direct changes in the main repository:

```bash
# Create a new branch for your changes
git checkout -b new-branch-name

# Make changes and commit them
git add .
git commit -m "Description of changes"

# Push the changes to the main repository
git push origin new-branch-name
```

### **2.3 Review and Merge Pull Requests**  
- Review pull requests submitted by forks (`main_user/php_project_coursera`).
- **Merge Pull Request** to incorporate changes into the main repository.

---

## **Summary of Key Commands**

| Action                         | Command                          |
| ------------------------------ | -------------------------------- |
| Sync fork                      | `git pull upstream main`         |
| Commit local changes           | `git commit -m "Description"`    |
| Push changes to fork           | `git push origin branch-name`    |
| Fetch changes from main repo   | `git pull origin main`           |
| Create a new branch            | `git checkout -b branch-name`    |
| Push changes to main repository| `git push origin branch-name`    |

---
