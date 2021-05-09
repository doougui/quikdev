export function getJoinedData (data = []) {
  return data.map(item => {
    return item.name;
  }).join(', ');
}

export function getFormattedDate (date) {
  const dateObj = new Date(date);
  return `${dateObj.getDate()}/${dateObj.getMonth() + 1}/${dateObj.getFullYear()}`
}